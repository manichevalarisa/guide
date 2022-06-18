<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Jobs\NotificationJob;
use App\Jobs\NotifyUserJob;
use App\Models\Payment;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Generate the liqpay button.
     *
     * @param Product $product
     * @param Request $request
     * @return mixed
     */
    public function generateForm(Product $product, Request $request)
    {
        if (!auth()->check()) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255'
            ]);
            $user = User::where('email', $request->email)->first();
            if(!$user) $user = User::create(['is_new' => 1, 'name' => $request->name, 'email' => $request->email, 'password' => bcrypt('password_' . time())]);
            if($user->checkForPaidProduct($product->id)) return redirect('/login')->with('status', t('Пользователь с этим электронным адресом уже  имеет доступ к данному инфопродукту. Пожалуйста, авторизуйтесь для просмотра лекций.'));
        } else {
            $user = auth()->user();
            if($user->checkForPaidProduct($product->id)) return redirect('/my-products');
        }

        $payment = Payment::create([
            'email' => $user->email,
            'payment_id' => '0',
            'status' => 'created',
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);

        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

        $data = [
            'action' => 'pay',
            'amount' => $product->current_price,
            'currency' => $request->currency ?? 'UAH',
            'description' => $product->name,
            'order_id' => $payment->id,
            'version' => '3',
            'server_url' => 'https://guarded-bastion-67667.herokuapp.com/api/payment-return',
            'result_url' => 'http://127.0.0.1:8000/api/liqpay/result-response'
        ];
        $sign = $liqpay->cnb_signature($data);
        $html = $liqpay->cnb_form($data);

        $payment->update(['payment_id' => $sign]);

        return view('payments.liqpay', compact('html'));
    }

    /**
     * Check result response.
     *
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function resultResponse(Request $request)
    {
        $sign = $request->signature;
        $data = json_decode(base64_decode($request->data), true);

        $status = 0;

        $signCheck = base64_encode( sha1(
            env('LIQPAY_PRIVATE_KEY') .
            $request->data .
            env('LIQPAY_PRIVATE_KEY')
            , 1 ));

        if($sign != $signCheck) throw new \Exception(t('Извините, но мы не можем авторизовать этот запрос. Пожалуйста, свяжитесь с нашей службой поддержки, если у вас возникли проблемы.'));

        $payment = Payment::whereId($data['order_id'])->first();
        if(!$payment) throw new \Exception(t('Извините, но мы не можем найти ваш заказ. Пожалуйста, свяжитесь с нашей службой поддержки, если у вас возникли проблемы.'));
        if ($payment && $data['status'] == 'success') {
            $product = $payment->product;
            if($payment->status == 'success') return view('payments.thanks_purchase', ['status' => 1]);
            $transaction = $data['transaction_id'];
            $payment->update(['status' => 'success', 'payment_id' => $transaction]);
            if(!auth()->check()) {
                $user = $payment->user;
                if(!$user) $user = User::whereEmail($data['email'])->first();
                if(!$user) $user = User::create(['name' => '', 'email' => $data['email'], 'password' => bcrypt('password_' . time()), 'is_new' => 1]);
                if($user->is_new) {
                    $token = app('auth.password.broker')->createToken($user);
                    NotifyUserJob::dispatch($user->id, 'sendPasswordResetNotificationAfterPurchase', ['token' => $token, 'transaction' => $transaction, 'lang' => lang(), 'product' => $product]);
                }
                else {
                    NotificationJob::dispatch('emails.purchase_welcome_instructions', ['user' => $user, 'transaction' => $transaction, 'lang' => lang(), 'product' => $product], $user->email, t('Спасибо за оплату!'));
                }
            } else {
                $user = auth()->user();
                NotificationJob::dispatch('emails.purchase_welcome_instructions', ['user' => $user, 'transaction' => $transaction, 'lang' => lang(), 'product' => $product], $user->email, t('Спасибо за оплату!'));
            }
            NotificationJob::dispatch('emails.admin_purchase_notification', ['user' => $user, 'transaction' => $transaction], 'manichevassvetlana@gmail.com', 'New Order');
            $status = 1;
        } else if($payment) {
            $payment->update(['status' => $data['status']]);
        }
        if(!$payment) echo 'payment   <br><br>';
        return view('payments.thanks_purchase', ['status' => $status]);
    }
}



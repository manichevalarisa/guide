<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotificationAfterPurchase extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The order transaction id.
     *
     * @var string
     */
    public $transaction;

    /**
     * The user's language.
     *
     * @var string
     */
    public $lang;

    /**
     * The product.
     *
     * @var string
     */
    public $product;

    /**
     * The callback that should be used to create the reset password URL.
     *
     * @var \Closure|null
     */
    public static $createUrlCallback;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @param  string  $transaction
     * @return void
     */
    public function __construct($token, $transaction, $lang, $product)
    {
        $this->token = $token;
        $this->transaction = $transaction;
        $this->lang = $lang;
        $this->product = $product;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        $user = $notifiable;
        $transaction = $this->transaction;
        $lang = $this->lang;
        $product = $this->product;
        return (new MailMessage)
            ->view('emails.purchase_welcome_instructions', compact('url', 'user', 'transaction', 'product', 'lang'))
            ->subject( $notifiable->name . ', ' . t('Thanks for the purchase!', 1, $lang));
    }

    /**
     * Set a callback that should be used when creating the reset password button URL.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}

<?php

namespace App;

use App\Models\Payment;
use App\Models\Product;
use App\Notifications\EmailVerifyNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\ResetPasswordNotificationAfterPurchase;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_new', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation: get payments.
     *
     * @return HasMany.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Relation: get payments.
     *
     * @return mixed
     */
    public function products()
    {
        $ids = $this->payments()->whereStatus('success')->pluck('product_id')->toArray();
        return Product::whereIn('id', $ids);
    }

    /**
     * Get paid products for the current user.
     *
     * @return mixed
     */
    public function getPaidProducts()
    {
        return $this->products()->get();
    }

    /**
     * Check for paid product.
     *
     * @param int $productId
     * @return mixed
     */
    public function checkForPaidProduct(int $productId)
    {
        return $this->products()->where('id', $productId)->exists();
    }


    /**
     * Update user's profile.
     *
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function updateProfile(array $data)
    {
        $collectedData = collect($data);
        $this->update($collectedData->only('name', 'email')->toArray());
        if(key_exists('new_password', $data) && key_exists('current_password', $data)) $this->updatePassword(['current_password' => $data['current_password'], 'new_password' => $data['new_password']]);
    }


    /**
     * Update user's password.
     *
     * @param $passwordArray
     * @return boolean
     * @throws \Exception
     */
    public function updatePassword(array $passwordArray)
    {
        if(empty($passwordArray['current_password']) || empty($passwordArray['new_password'])) return false;
        if (!Hash::check($passwordArray['current_password'], $this->password)) throw new \Exception(t('An incorrect current password was entered.'));
        if(strlen($passwordArray['new_password']) < 6) throw new \Exception(t('The password must be more than 6 characters long.'));
        $this->password = Hash::make($passwordArray['new_password']);
        return $this->save();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification mail.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerifyNotification());
    }

    /**
     * Send the password reset notification after buy a product.
     *
     * @param  array  $tokenAndId
     * @return void
     */
    public function sendPasswordResetNotificationAfterPurchase($tokenAndId)
    {
        $this->notify(new ResetPasswordNotificationAfterPurchase($tokenAndId['token'], $tokenAndId['transaction'], $tokenAndId['lang'], $tokenAndId['product']));
    }
}

<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Send the email message to email address.
     *
     * @param string $view
     * @param array $data
     * @param string $to
     * @param string $subject
     * @param string $from
     *
     * @return int
     */
    public static function send(string $view, array $data, string $to, string $subject = null, string $from = null) : int
    {
        //try {
            Mail::send($view, $data, function ($message) use ($to, $from, $subject) {
                $message->to($to, $from)->subject($subject);
            });
       /* } catch (\Exception $exception) {
            return 0;
        }*/

        return 1;
    }
}

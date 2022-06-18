<?php

namespace App\Jobs;

use App\Http\Controllers\Mails\MailController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The view for sending email.
     *
     * @var string
     */
    public $view;

    /**
     * Data of the email.
     *
     * @var array
     */
    public $data;

    /**
     * Person to send the email.
     *
     * @var string
     */
    public $to;

    /**
     * Subject of the email.
     *
     * @var string
     */
    public $subject;

    /**
     * Create a new job instance.
     * @param string $view
     * @param array $data
     * @param string $to
     * @param string $subject
     * @return void
     */
    public function __construct(string $view, array $data, string $to, string $subject = null)
    {
        $this->from = $from ?? config('app.name');
        $this->subject = $subject ?? t(': Thanks for request');
        $this->to = $to;
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        MailController::send($this->view, $this->data, $this->to, $this->subject);
    }
}

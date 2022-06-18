<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The user's id.
     *
     * @var int
     */
    public $userId;

    /**
     * The user's notification method.
     *
     * @var string
     */
    public $method;

    /**
     * The method's data.
     *
     * @var mixed
     */
    public $data;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     * @param string $method
     * @param mixed $data
     * @return void
     */
    public function __construct(int $userId, string $method, $data = null)
    {
        $this->userId = $userId;
        $this->method = $method;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::findOrfail($this->userId);
        $method = $this->method;
        $user->$method($this->data);
    }
}

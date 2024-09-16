<?php
namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessUserUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    public function handle()
    {
        Log::info('Received user data from RabbitMQ', [
            'userData' => $this->userData
        ]);

        // Process the user data here
    }
}

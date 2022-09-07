<?php

namespace App\Events\Back\Auth;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TwoFactorAuthentication
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $phone_number;

    public function __construct($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('resend-two-factor-authentication');
    }
}

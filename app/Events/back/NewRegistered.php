<?php

namespace App\Events\back;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('new-registered');
    }
}

<?php

namespace App\Notifications\Back\Auth;

use App\Http\Traits\Api\Auth\GeneratePasswordResetLinkTrait;
use App\Http\Traits\Back\Sms\CanSendSmsTrait;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class RequestResetPasswordNotification extends Notification
{
    use Queueable, GeneratePasswordResetLinkTrait, CanSendSmsTrait;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;

        $this->sendText($user->phone_number, $this->generateLink($this->user->phone_number), 'reset-password');
    }

    public function via($notifiable): array
    {
        return [];
    }
}

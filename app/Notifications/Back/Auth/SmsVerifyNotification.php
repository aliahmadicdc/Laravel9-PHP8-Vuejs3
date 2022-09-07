<?php

namespace App\Notifications\Back\Auth;

use App\Http\Traits\Api\Auth\GenerateVerifyCodeTrait;
use App\Http\Traits\Back\Sms\CanSendSmsTrait;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SmsVerifyNotification extends Notification
{
    use Queueable, GenerateVerifyCodeTrait, CanSendSmsTrait;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;

        $this->sendText($user->phone_number, $this->generateCode($user));
    }

    public function via($notifiable): array
    {
        return [];
    }
}

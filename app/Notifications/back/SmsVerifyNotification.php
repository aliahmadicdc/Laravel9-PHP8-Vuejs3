<?php

namespace App\Notifications\back;

use App\Http\Traits\back\GenerateVerifyCodeTrait;
use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use NotificationChannels\RayganSms\AuthCodeMessage;
use NotificationChannels\RayganSms\RayganSmsChannel;

class SmsVerifyNotification extends BaseNotification
{
    use Queueable,GenerateVerifyCodeTrait;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return [RayganSmsChannel::class];
    }

    public function toRayganSms($notifiable): AuthCodeMessage
    {
        return (new AuthCodeMessage)
            ->content($this->generateCode($this->user))
            ->autoGenerate(false);
    }
}

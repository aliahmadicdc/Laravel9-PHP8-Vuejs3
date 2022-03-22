<?php

namespace App\Notifications\back;

use App\Http\Traits\back\GeneratePasswordResetLinkTrait;
use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use NotificationChannels\RayganSms\AuthCodeMessage;

class RequestResetPasswordNotification extends BaseNotification
{
    use Queueable, GeneratePasswordResetLinkTrait;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;

        (new AuthCodeMessage)
            ->content($this->generateLink($this->user->phone_number))
            ->autoGenerate(false);
    }

    public function via($notifiable):array
    {
        return [];
    }

    public function toRayganSms($notifiable): AuthCodeMessage
    {
        return (new AuthCodeMessage)
            ->content($this->generateLink($this->user->phone_number))
            ->autoGenerate(false);
    }
}

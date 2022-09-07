<?php

namespace App\Notifications\Back\Auth;

use App\Http\Traits\Back\General\EmailVerify\CanVerifyEmailTrait;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerifyNotification extends Notification implements ShouldQueue
{
    use Queueable, CanVerifyEmailTrait;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = $this->createEmailVerificationToken($this->user);
        $subject = trans('messages.emailVerify');
        $title = trans('messages.emailVerify');
        $mainText = trans('messages.emailVerifyText');
        $buttonText = trans('messages.emailVerify');
        $footerText = trans('messages.emailVerifyFooterText');

        return (new MailMessage)
            ->subject($subject)
            ->view('mail.mail_template',
                compact('title', 'mainText', 'url', 'buttonText', 'footerText'));
    }
}

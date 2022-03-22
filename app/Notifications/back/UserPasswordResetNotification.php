<?php

namespace App\Notifications\back;

use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use JetBrains\PhpStorm\ArrayShape;

class UserPasswordResetNotification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = route('panel.dashboard');
        $subject = trans('messages.userPasswordReset');
        $title = trans('messages.userPasswordReset');
        $mainText = trans('messages.userPasswordResetText') . ' '
            . trans('messages.name') . ' : ' . $this->user->name . ' '
            . trans('messages.phoneNumber') . ' : ' . $this->user->phone_number;
        $buttonText = trans('messages.panel');
        $footerText = trans('messages.userPasswordResetFooterText');

        return (new MailMessage)
            ->subject($subject)
            ->view('mail.mail_template',
                compact('title', 'mainText', 'url', 'buttonText', 'footerText'));
    }

    #[ArrayShape(['title' => "mixed", 'text' => "string"])] public function toArray($notifiable): array
    {
        return [
            'title' => trans('messages.userPasswordReset'),
            'text' => trans('messages.userPasswordResetText') . ' '
                . trans('messages.name') . ' : ' . $this->user->name . ' '
                . trans('messages.phoneNumber') . ' : ' . $this->user->phone_number,
        ];
    }
}

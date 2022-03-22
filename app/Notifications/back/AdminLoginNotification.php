<?php

namespace App\Notifications\back;

use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminLoginNotification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    private $user;

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
        $subject = trans('messages.newAdminLogin');
        $title = trans('messages.newAdminLogin');
        $mainText = trans('messages.newAdminLoginText') . ' '
            . trans('messages.name') . ' : ' . $this->user->name . ' '
            . trans('messages.email') . ' : ' . $this->user->email;
        $buttonText = trans('messages.panel');
        $footerText = trans('messages.newAdminLoginFooterText');

        return (new MailMessage)
            ->subject($subject)
            ->view('mail.mail_template',
                compact('title', 'mainText', 'url', 'buttonText', 'footerText'));
    }

    public function toArray($notifiable): array
    {
        return [
            'title' => trans('messages.newAdminLogin'),
            'text' => trans('messages.newAdminLoginText') . ' '
                . trans('messages.name') . ' : ' . $this->user->name . ' '
                . trans('messages.email') . ' : ' . $this->user->email,
        ];
    }
}

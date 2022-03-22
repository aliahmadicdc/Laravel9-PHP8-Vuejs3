<?php

namespace App\Notifications\back;

use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use JetBrains\PhpStorm\ArrayShape;

class NewRegisteredToAdminNotification extends BaseNotification implements ShouldQueue
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
        $subject = trans('messages.newUserRegistered');
        $title = trans('messages.newUserRegistered');
        $mainText = trans('messages.newUserRegisteredText') . ' '
            . trans('messages.name') . ' : ' . $this->user->name . ' '
            . trans('messages.email') . ' : ' . $this->user->email;
        $buttonText = trans('messages.panel');
        $footerText = trans('messages.newUserRegisteredFooterText');

        return (new MailMessage)
            ->subject($subject)
            ->view('mail.mail_template',
                compact('title', 'mainText', 'url', 'buttonText', 'footerText'));
    }

    #[ArrayShape(['title' => "mixed", 'text' => "string"])] public function toArray($notifiable): array
    {
        return [
            'title' => trans('messages.newUserRegistered'),
            'text' => trans('messages.newUserRegisteredText') . ' '
                . trans('messages.name') . ' : ' . $this->user->name . ' '
                . trans('messages.email') . ' : ' . $this->user->email,
        ];
    }
}

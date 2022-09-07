<?php

namespace App\Notifications\Back\Auth;

use App\Models\User;
use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use JetBrains\PhpStorm\ArrayShape;
use Tzsk\Sms\Builder;
use function route;
use function trans;

class UserPasswordResetNotification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function toMail($notifiable): MailMessage
    {
        $url = 'https://panel.didebanco.com';
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

    public function toSms($notifiable): Builder
    {
        return (new Builder)->via('farazsms')
            ->send('')
            ->to(0);
    }
}

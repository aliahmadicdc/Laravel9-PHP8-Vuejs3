<?php

namespace App\Listeners\Back\Auth;

use App\Notifications\Back\Auth\EmailVerifyNotification;
use Illuminate\Support\Facades\Notification;

class EmailVerificationListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        Notification::send($event->user, new EmailVerifyNotification($event->user));
    }
}

<?php

namespace App\Listeners\Back\Auth;

use App\Notifications\Back\Auth\SmsVerifyNotification;
use Illuminate\Support\Facades\Notification;

class NewRegisteredListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        Notification::send($event->user, new SmsVerifyNotification($event->user));
    }
}

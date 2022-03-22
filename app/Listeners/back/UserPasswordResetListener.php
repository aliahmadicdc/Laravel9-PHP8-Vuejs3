<?php

namespace App\Listeners\back;

use App\Notifications\back\UserPasswordResetNotification;
use Illuminate\Support\Facades\Notification;

class UserPasswordResetListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        Notification::send($event->user, new UserPasswordResetNotification($event->user));
    }
}

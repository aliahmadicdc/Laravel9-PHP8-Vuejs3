<?php

namespace App\Listeners\Back\Auth;

use App\Notifications\Back\Auth\UserPasswordResetNotification;
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

<?php

namespace App\Listeners\Back\Auth;

use App\Notifications\Back\Auth\RequestResetPasswordNotification;
use Illuminate\Support\Facades\Notification;

class RequestResetPasswordListener
{
    public function __construct()
    {
        //
    }

    public function handle($event):void
    {
        Notification::send($event->user,new RequestResetPasswordNotification($event->user));
    }
}

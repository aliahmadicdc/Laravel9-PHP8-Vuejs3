<?php

namespace App\Listeners\back;

use App\Notifications\back\RequestResetPasswordNotification;
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

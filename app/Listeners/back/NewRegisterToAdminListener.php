<?php

namespace App\Listeners\back;

use App\Models\User;
use App\Notifications\back\NewRegisteredToAdminNotification;
use Illuminate\Support\Facades\Notification;

class NewRegisterToAdminListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        $admin = User::whereHas('roles', function ($q) {
            $q->where('title', 'admin');
        })->get();

        Notification::send($admin, new NewRegisteredToAdminNotification($event->user));
    }
}

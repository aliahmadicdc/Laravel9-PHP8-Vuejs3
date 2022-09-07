<?php

namespace App\Listeners\Back\Auth;

use App\Models\User;
use App\Notifications\Back\Auth\NewRegisteredToAdminNotification;
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

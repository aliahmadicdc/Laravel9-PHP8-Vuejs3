<?php

namespace App\Listeners\Back\Auth;

use App\Models\User;
use App\Notifications\Back\Auth\AdminLoginNotification;
use Illuminate\Support\Facades\Notification;

class AdminLoginListener
{
    public function __construct()
    {

    }

    public function handle($event): void
    {
        $admin = User::whereHas('roles', function ($q) {
            $q->where('value', 'admin');
        })->get();

        Notification::send($admin, new AdminLoginNotification($event->user));
    }
}

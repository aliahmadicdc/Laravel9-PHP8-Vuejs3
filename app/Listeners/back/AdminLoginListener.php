<?php

namespace App\Listeners\back;

use App\Models\User;
use App\Notifications\back\AdminLoginNotification;
use Illuminate\Support\Facades\Notification;

class AdminLoginListener
{
    public function __construct()
    {

    }

    public function handle($event): void
    {
        $admin = User::whereHas('roles', function ($q) {
            $q->where('title', 'admin');
        })->get();

        Notification::send($admin, new AdminLoginNotification($event->user));
    }
}

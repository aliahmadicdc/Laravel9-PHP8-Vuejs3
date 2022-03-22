<?php

namespace App\Actions\api\back;

use Illuminate\Contracts\Auth\Authenticatable;

class UserAction
{
    public function getAuthUser(): Authenticatable
    {
        $user = auth()->user();
        $user->notifications = $user->unreadNotifications();

        return $user;
    }
}

<?php

namespace App\Actions\Api\Auth;

use App\Http\Enums\Api\Back\User\OptionKeys;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterAction
{
    public function createUser($data): User
    {
        $user = User::create([
            'phone_number' => $data['phone_number'],
            'name' => trans('messages.user'),
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(50),
            'user_id' => Str::random(10) . time(),
            'username' => Str::random(10) . time(),
        ]);
        $user->roles()->attach([2]);
        $user->options()->createMany([
            [
                'option_key' => OptionKeys::MESSAGE_NOTIFICATION,
                'option_value' => 1
            ],
            [
                'option_key' => OptionKeys::EMAIL_NOTIFICATION,
                'option_value' => 1
            ],
            [
                'option_key' => OptionKeys::SMS_NOTIFICATION,
                'option_value' => 0
            ],
            [
                'option_key' => OptionKeys::TWO_FACTOR_AUTHENTICATION,
                'option_value' => 0
            ]
        ]);

        return $user;
    }
}

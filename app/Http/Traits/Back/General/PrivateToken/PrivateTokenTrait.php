<?php

namespace App\Http\Traits\Back\General\PrivateToken;

use App\Models\Back\Admin\PrivateToken\PrivateToken;
use Illuminate\Support\Str;

trait PrivateTokenTrait
{
    public function createToken()
    {
        return PrivateToken::create([
            'token' => Str::random(50),
            'user_id' => auth()->user()->id
        ]);
    }
}

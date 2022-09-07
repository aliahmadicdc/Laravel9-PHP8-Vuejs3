<?php

namespace App\Models\Back\Auth;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TwoFactorAuthenticationCode extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'phone_number'
    ];
}

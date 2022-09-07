<?php

namespace App\Models\Back\Auth;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordReset extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'phone_number',
        'token'
    ];
}

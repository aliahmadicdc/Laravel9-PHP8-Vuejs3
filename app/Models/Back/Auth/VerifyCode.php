<?php

namespace App\Models\Back\Auth;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifyCode extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'user_id',
    ];
}

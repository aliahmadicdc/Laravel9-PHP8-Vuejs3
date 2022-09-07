<?php

namespace App\Models\Back\User;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailVerify extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'token',
        'status'
    ];
}

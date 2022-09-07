<?php

namespace App\Models\Back\Admin\PrivateToken;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivateToken extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'token',
        'user_id',
        'status',
        'seen'
    ];
}

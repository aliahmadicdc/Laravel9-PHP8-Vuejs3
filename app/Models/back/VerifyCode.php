<?php

namespace App\Models\back;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VerifyCode extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
    ];
}

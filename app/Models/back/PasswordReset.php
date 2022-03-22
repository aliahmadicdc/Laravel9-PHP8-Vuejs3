<?php

namespace App\Models\back;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordReset extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'token'
    ];
}

<?php

namespace App\Models\Back\Admin\Option;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'option_key',
        'option_value',
        'user_id'
    ];
}

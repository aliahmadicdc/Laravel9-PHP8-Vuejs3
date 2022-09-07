<?php

namespace App\Models\Back\Admin\Timezone;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timezone extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'value',
        'status'
    ];
}

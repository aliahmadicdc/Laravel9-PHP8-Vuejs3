<?php

namespace App\Models\Back\Admin\Language;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'value',
        'status'
    ];
}

<?php

namespace App\Models\Back\User;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use SoftDeletes;
}

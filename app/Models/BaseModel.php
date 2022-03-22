<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getUpdatedAtAttribute($updated_at): string
    {
        return jdate($updated_at)->format('H:m:s Y-m-d');
    }

    public function getCreatedAtAttribute($created_at): string
    {
        return jdate($created_at)->format('H:m:s Y-m-d');
    }
}

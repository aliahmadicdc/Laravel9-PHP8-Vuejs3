<?php

namespace App\Actions\Api\Back\Admin\Timezone;

use App\Models\Back\Admin\Timezone\Timezone;

class TimezoneAction
{
    public function getAllTimezones()
    {
        return Timezone::where('status', 1)->get();
    }
}

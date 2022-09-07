<?php

namespace App\Actions\Api\Back\Admin\Language;

use App\Models\Back\Admin\Language\Language;

class LanguageAction
{
    public function getAllLanguages()
    {
        return Language::where('status', 1)->get();
    }
}

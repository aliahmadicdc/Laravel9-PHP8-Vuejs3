<?php

namespace App\Actions\Api\Back\Admin\General;

use App\Actions\Api\Back\Admin\Language\LanguageAction;
use App\Actions\Api\Back\Admin\Timezone\TimezoneAction;
use App\Http\Resources\Back\Admin\Language\LanguageResource;
use App\Http\Resources\Back\Admin\Timezone\TimezoneResource;

class GeneralAction
{
    public function getMainOptions(): array
    {
        $options['languages'] = LanguageResource::collection((new LanguageAction())->getAllLanguages());
        $options['timezones'] = TimezoneResource::collection((new TimezoneAction())->getAllTimezones());

        return $options;
    }
}

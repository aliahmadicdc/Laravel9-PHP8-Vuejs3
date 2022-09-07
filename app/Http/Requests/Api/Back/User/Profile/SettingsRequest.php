<?php

namespace App\Http\Requests\Api\Back\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['email_notification' => "string[]", 'sms_notification' => "string[]", 'message_notification' => "string[]", 'two_factor_authentication' => "string[]"])]
    public function rules(): array
    {
        return [
            'email_notification' => ['required', 'bool'],
            'sms_notification' => ['required', 'bool'],
            'message_notification' => ['required', 'bool'],
            'two_factor_authentication' => ['required', 'bool']
        ];
    }
}

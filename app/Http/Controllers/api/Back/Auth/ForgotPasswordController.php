<?php

namespace App\Http\Controllers\Api\Back\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Traits\Api\Auth\ResetPasswordWithPhoneNumberTrait;

class ForgotPasswordController extends BaseApiController
{
    use ResetPasswordWithPhoneNumberTrait;
}

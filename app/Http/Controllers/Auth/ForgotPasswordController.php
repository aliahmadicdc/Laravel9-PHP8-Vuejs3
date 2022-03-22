<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\back\ResetPasswordWithPhoneNumberTrait;

class ForgotPasswordController extends Controller
{
    use ResetPasswordWithPhoneNumberTrait;
}

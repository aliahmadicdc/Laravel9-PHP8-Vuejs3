<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\back\ResetPasswordTrait;
use App\Providers\RouteServiceProvider;

class ResetPasswordController extends Controller
{
    use ResetPasswordTrait;

    protected $redirectTo = RouteServiceProvider::HOME;
}

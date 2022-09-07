<?php

namespace App\Http\Controllers\Api\Back\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Traits\Api\Auth\RegistersUsersTrait;

class RegisterController extends BaseApiController
{
    use RegistersUsersTrait;
}

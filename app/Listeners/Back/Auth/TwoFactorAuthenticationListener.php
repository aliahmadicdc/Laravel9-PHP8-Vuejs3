<?php

namespace App\Listeners\Back\Auth;

use App\Http\Traits\Api\Auth\GenerateTwoFactorAuthenticationCodeTrait;
use App\Http\Traits\Back\Sms\CanSendSmsTrait;

class TwoFactorAuthenticationListener
{
    use CanSendSmsTrait,GenerateTwoFactorAuthenticationCodeTrait;

    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        $this->sendText($event->phone_number, $this->generateCode($event->phone_number),'two-step');
    }
}

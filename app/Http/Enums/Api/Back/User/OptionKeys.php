<?php

namespace App\Http\Enums\Api\Back\User;

abstract class OptionKeys
{
    const TWO_FACTOR_AUTHENTICATION = "two_factor_authentication";
    const MESSAGE_NOTIFICATION = "message_notification";
    const SMS_NOTIFICATION = "sms_notification";
    const EMAIL_NOTIFICATION = "email_notification";
    const TIMEZONE = "timezone";
    const LANGUAGE = "language";
}

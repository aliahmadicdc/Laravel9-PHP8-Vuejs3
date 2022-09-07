<?php

namespace App\Providers;

use App\Events\Back\Auth\AdminLogin;
use App\Events\Back\Auth\NewRegistered;
use App\Events\Back\Auth\RequestResetPassword;
use App\Events\Back\Auth\ResendEmailVerification;
use App\Events\Back\Auth\ResendSmsVerification;
use App\Events\Back\Auth\TwoFactorAuthentication;
use App\Events\Back\Auth\UserPasswordReset;
use App\Listeners\Back\Auth\AdminLoginListener;
use App\Listeners\Back\Auth\EmailVerificationListener;
use App\Listeners\Back\Auth\NewRegisteredListener;
use App\Listeners\Back\Auth\NewRegisterToAdminListener;
use App\Listeners\Back\Auth\RequestResetPasswordListener;
use App\Listeners\Back\Auth\TwoFactorAuthenticationListener;
use App\Listeners\Back\Auth\UserPasswordResetListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NewRegistered::class => [
            NewRegisteredListener::class,
            NewRegisterToAdminListener::class
        ],
        AdminLogin::class => [
            AdminLoginListener::class
        ],
        ResendSmsVerification::class => [
            NewRegisteredListener::class
        ],
        UserPasswordReset::class => [
            UserPasswordResetListener::class
        ],
        RequestResetPassword::class => [
            RequestResetPasswordListener::class
        ],
        ResendEmailVerification::class => [
            EmailVerificationListener::class
        ],
        TwoFactorAuthentication::class => [
            TwoFactorAuthenticationListener::class
        ]
    ];

    public function boot(): void
    {
        //
    }
}

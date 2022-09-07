<?php

use App\Http\Controllers\Api\Back;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::post('login', [Back\Auth\LoginController::class, 'login'])->middleware('throttle:3')->name('login');
    Route::post('register', [Back\Auth\RegisterController::class, 'register'])->middleware('throttle:2')->name('register');
    Route::post('logout', [Back\Auth\LoginController::class, 'logout'])->name('logout');

    Route::post('password/request', [Back\Auth\ForgotPasswordController::class, 'sendResetLinkPhoneNumber'])->middleware('throttle:2')->name('password.request');
    Route::post('password/confirm', [Back\Auth\ResetPasswordController::class, 'confirm'])->name('password.confirm');
    Route::post('password/reset', [Back\Auth\ResetPasswordController::class, 'reset'])->name('password.reset');

    Route::post('twoFactorAuthentication/check', [Back\Auth\VerificationController::class, 'checkTwoStepCode'])->middleware('throttle:2')->name('twoFactorAuthentication.check');
    Route::post('twoFactorAuthentication/resend', [Back\Auth\VerificationController::class, 'resendTwoStepCode'])->middleware('throttle:2')->name('twoFactorAuthentication.resend');

    //require login routes
    Route::middleware('auth:api')->group(function () {

        Route::middleware('auth.api.checkUserStatus')->group(function () {
            Route::post('verify/check', [Back\Auth\VerificationController::class, 'checkCode'])->middleware('throttle:2')->name('verify.check');
            Route::get('verify/resend', [Back\Auth\VerificationController::class, 'resendCode'])->middleware('throttle:2')->name('verify.resend');

            //require verify routes
            Route::middleware('auth.api.checkVerify')->group(function () {

                Route::prefix('profile')->name('profile.')->group(function () {
                    Route::get('/userInfo', [Back\User\UserController::class, 'index'])->name('.userInfo');
                    Route::get('/notifications', [Back\User\UserController::class, 'notifications'])->name('userNotifications');
                    Route::post('/updatePersonalInformation', [Back\User\UserController::class, 'updatePersonalInformation'])->name('updatePersonalInformation');
                    Route::post('/updateProfileImage', [Back\User\UserController::class, 'updateProfileImage'])->name('updateProfileImage');
                    Route::get('/deleteProfileImage', [Back\User\UserController::class, 'deleteProfileImage'])->name('deleteProfileImage');
                    Route::post('/updateAccountInformation', [Back\User\UserController::class, 'updateAccountInformation'])->name('updateAccountInformation');
                    Route::post('/updatePassword', [Back\User\UserController::class, 'updatePassword'])->name('updatePassword');
                    Route::post('/updateSettings', [Back\User\UserController::class, 'updateSettings'])->name('updateSettings');
                    Route::get('/disableAccount', [Back\User\UserController::class, 'disableAccount'])->name('disableAccount');
                    Route::get('email/verify/send', [Back\Auth\VerificationController::class, 'emailVerifySend'])->middleware('throttle:2')->name('email.verify.send');
                    Route::post('email/verify/check', [Back\Auth\VerificationController::class, 'emailVerifyCheck'])->middleware('throttle:2')->name('email.verify.check');
                });
            });
        });
    });
});

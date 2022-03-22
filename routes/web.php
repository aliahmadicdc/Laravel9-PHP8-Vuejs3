<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front;
use App\Http\Controllers\back;

//auth route
Auth::routes();

//forget password
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('throttle:2')->name('password.email');

//back routes
Route::prefix('panel')->middleware('auth')->name('panel')->group(function () {

    //verify phone number
    Route::get('verify', [VerificationController::class, 'index'])->name('.verify');
    Route::post('verify/check', [VerificationController::class, 'checkCode'])->name('.verify.check');
    Route::get('verify/resend', [VerificationController::class, 'resendCode'])->middleware('throttle:2')->name('.verify.resend');

    //verified routes
    Route::middleware('auth.verify')->group(function () {
        //dashboard
        Route::get('/{any?}', [back\DashboardController::class, 'index'])->where('any', '(.*)')->name('.dashboard');
    });
});

//front routes
Route::name('front')->group(function () {
    //pages
    Route::get('', [front\HomeController::class, 'index'])->name('.home');
    Route::get('/sitemap', function () {
        redirect(url('/sitemap.xml'));
    })->name('.sitemap');
});

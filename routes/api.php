<?php

use App\Http\Controllers\api\back;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.')->group(function () {

    Route::middleware('auth:api')->group(function () {

        Route::middleware('auth.api.checkVerify')->group(function () {
            Route::get('/userInfo', [back\UserController::class, 'index'])->name('userInfo');
        });
    });
});

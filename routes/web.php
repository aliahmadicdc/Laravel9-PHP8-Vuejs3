<?php

use App\Http\Controllers\Back\Global\Image\ImageController;
use App\Http\Controllers\Back\PanelController;
use Illuminate\Support\Facades\Route;

//back routes
Route::name('panel')->group(function () {
    //image download
    Route::get('private/images', [ImageController::class, 'download'])->name('.private.images.download');

    //panel
    Route::get('/{any?}', [PanelController::class, 'index'])->where('any', '(.*)')->name('.all');
});

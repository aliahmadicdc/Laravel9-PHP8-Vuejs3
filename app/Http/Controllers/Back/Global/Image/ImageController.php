<?php

namespace App\Http\Controllers\Back\Global\Image;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Back\Global\Image\DownloadImageRequest;
use App\Models\Back\Admin\PrivateToken\PrivateToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends BaseController
{
    public function download(DownloadImageRequest $request): StreamedResponse
    {
        if (PrivateToken::where('token', $request->validated()['privateToken'])->where('created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString())->exists())
            return Storage::disk('local')->download(urldecode($request->validated()['url']));
    }
}

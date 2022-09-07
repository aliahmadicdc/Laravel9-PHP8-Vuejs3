<?php

namespace App\Services\Back\General\Image;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Back\Global\Image\Image as ImageModel;
use \Intervention\Image\Image as IMG;

class ImageUtilityService
{
    public function saveImageForPrivate($path, $image)
    {
        Storage::disk('local')->put($path, $image);

        return $image;
    }

    public function saveImageForPublic($path, $image)
    {
        Storage::disk('public')->put($path, $image);

        return $image;
    }

    public function createImageFromRequest($requestedImage): IMG
    {
        return Image::make($requestedImage);
    }

    public function createWaterMark($image, $position = 'bottom-right', $watermark_path = 'assets/back/media/watermark.png')
    {
        $watermark = Image::make($watermark_path);

        $watermark->resize(null, $image->height() / 4, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->insert($watermark, $position);

        return $image;
    }

    public function resizeImage($image, $size = 400, $quality = 60, $extension = 'jpg')
    {
        $image->resize(null, $size, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->encode($extension, $quality);

        return $image;
    }

    public function createThumbnail($image, $size = 200)
    {
        return $image->resize(null, $size, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }

    public function generateName($extension, $suggested_name = null): string
    {
        return ($suggested_name ?? 'image') . '_' . time() . mt_rand(111, 999) . '.' . $extension;
    }

    public function generateDirectoryName(): string
    {
        return time();
    }

    public function createImageModel($model, $imageName, $directory, $image_full_path, $thumbnail_full_path, $thumbnail_sub_directory = 'thumbnail', $upload_type = 'public', $alt = null)
    {
        return ImageModel::create([
            'name' => $imageName,
            'alt' => $alt ?? $imageName,
            'directory' => $directory,
            'thumbnail_sub_directory' => $thumbnail_sub_directory,
            'upload_type' => $upload_type,
            'image_full_path' => $image_full_path,
            'thumbnail_full_path' => $thumbnail_full_path,
            'imageable_id' => $model->id,
            'imageable_type' => $model::class,
        ]);
    }
}

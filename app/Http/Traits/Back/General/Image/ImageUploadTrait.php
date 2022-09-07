<?php

namespace App\Http\Traits\Back\General\Image;

use App\Models\Back\Global\Image\Image;
use App\Services\Back\General\Image\ImageUtilityService;

trait ImageUploadTrait
{
    public string $private_image_path = 'images';
    public string $public_image_path = 'images';
    public string $thumbnail_path = 'thumbnail';

    public function uploadPrivateImage($requestedImage, $model): bool|Image
    {
        try {
            $imageUtilityService = new ImageUtilityService();

            $imageName = $imageUtilityService->generateName($requestedImage->extension());
            $directory = $imageUtilityService->generateDirectoryName();

            $image = $imageUtilityService->createImageFromRequest($requestedImage);
            $image = $imageUtilityService->resizeImage($image);
            $thumbnail = $imageUtilityService->createThumbnail($image);

            $imageUtilityService->saveImageForPrivate($this->private_image_path . '/' . $directory . '/' . $imageName, $image);
            $imageUtilityService->saveImageForPrivate($this->private_image_path . '/' . $directory . '/' . $this->thumbnail_path . '/' . $imageName, $thumbnail);

            return $imageUtilityService->createImageModel(
                $model,
                $imageName,
                $directory,
                $this->private_image_path . '/' . $directory . '/' . $imageName,
                $this->private_image_path . '/' . $directory . '/' . $this->thumbnail_path . '/' . $imageName,
                $this->thumbnail_path,
                'private'
            );
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function uploadPublicImage($requestedImage, $model): bool|Image
    {
        try {
            $imageUtilityService = new ImageUtilityService();

            $imageName = $imageUtilityService->generateName($requestedImage->extension());
            $directory = $imageUtilityService->generateDirectoryName();

            $image = $imageUtilityService->createImageFromRequest($requestedImage);
            $image = $imageUtilityService->resizeImage($image);
            $thumbnail = $imageUtilityService->createThumbnail($image);

            $imageUtilityService->saveImageForPublic($this->public_image_path . '/' . $directory . '/' . $imageName, $image);
            $imageUtilityService->saveImageForPublic($this->public_image_path . '/' . $directory . '/' . $this->thumbnail_path . '/' . $imageName, $thumbnail);

            return $imageUtilityService->createImageModel(
                $model,
                $imageName,
                $directory,
                env('APP_URL') . '/storage/' . $this->public_image_path . '/' . $directory . '/' . $imageName,
                env('APP_URL') . '/storage/' . $this->public_image_path . '/' . $directory . '/' . $this->thumbnail_path . '/' . $imageName
            );
        } catch (\Exception $exception) {
            return false;
        }
    }
}

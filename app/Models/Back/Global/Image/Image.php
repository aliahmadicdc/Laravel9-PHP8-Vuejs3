<?php

namespace App\Models\Back\Global\Image;

use App\Http\Traits\Back\General\PrivateToken\PrivateTokenTrait;
use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends BaseModel
{
    use SoftDeletes, PrivateTokenTrait;

    protected $fillable = [
        'name',
        'alt',
        'directory',
        'thumbnail_sub_directory',
        'upload_type',
        'image_full_path',
        'thumbnail_full_path',
        'imageable_id',
        'imageable_type'
    ];

    public function getImageFullPathAttribute($image_full_path): string
    {
        if ($this->imageable_type == User::class && $image_full_path != null) {
            try {
                $image_full_path = route('panel.private.images.download', [
                    'url' => urlencode($image_full_path),
                    'privateToken' => ($this->createToken())->token
                ]);
            } catch (\Exception $e) {
                return asset('assets/back/media/profile.png');
            }
        }

        return $image_full_path;
    }
}

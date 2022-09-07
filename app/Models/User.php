<?php

namespace App\Models;

use App\Models\Back\Admin\Option\Option;
use App\Models\Back\Auth\VerifyCode;
use App\Models\Back\Global\Image\Image;
use App\Models\Back\User\EmailVerify;
use App\Models\Back\User\Role;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, MustVerifyEmail, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'username',
        'phone_number',
        'phone_number_verified_at',
        'email',
        'email_verified_at',
        'password',
        'api_token',
        'firebase_token',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_number_verified_at' => 'datetime',
    ];

    protected $with = [
        'roles',
        'options',
        'image'
    ];

    public function getRouteKeyName(): string
    {
        return 'phone_number';
    }

    public function verifyCodes(): HasMany
    {
        return $this->hasMany(VerifyCode::class)->orderBy('id','ASC');
    }

    public function emailVerifies(): HasMany
    {
        return $this->hasMany(EmailVerify::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function isAdmin(): bool
    {
        return in_array('admin', $this->roles->pluck('value')->toArray());
    }

    public function isUser(): bool
    {
        return in_array('user', $this->roles->pluck('value')->toArray());
    }

    public function hasOption($option): bool
    {
        foreach ($this->options as $opt) {
            if ($opt->option_key == $option && $opt->option_value)
                return true;
        }

        return false;
    }

    public function getEmailVerifiedAtAttribute($email_verified_at): ?string
    {
        if ($email_verified_at)
            return jdate($email_verified_at)->format('H:m:s Y-m-d');

        return null;
    }

    public function getPhoneNumberVerifiedAtAttribute($phone_number_verified_at): ?string
    {
        if ($phone_number_verified_at)
            return jdate($phone_number_verified_at)->format('H:m:s Y-m-d');

        return null;
    }
}

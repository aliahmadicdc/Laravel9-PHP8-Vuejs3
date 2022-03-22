<?php

namespace App\Models;

use App\Models\back\Role;
use App\Models\back\VerifyCode;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, MustVerifyEmail,HasApiTokens;

    protected $fillable = [
        'name',
        'phone_number',
        'phone_number_verified_at',
        'email',
        'email_verified_at',
        'skill',
        'web_site',
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

    protected $with=[
        'roles'
    ];

    public function routeNotificationForRayganSms(): string
    {
        return $this->phone_number;
    }

    public function getRouteKeyName(): string
    {
        return 'phone_number';
    }

    public function verifyCodes(): HasMany
    {
        return $this->hasMany(VerifyCode::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin(): bool
    {
        return in_array('admin', $this->roles->pluck('title')->toArray());
    }

    public function isUser(): bool
    {
        return in_array('user', $this->roles->pluck('title')->toArray());
    }

    public function isProvider(): bool
    {
        return in_array('provider', $this->roles->pluck('title')->toArray());
    }

    public function getUpdatedAtAttribute($updated_at): string
    {
        return jdate($updated_at)->format('H:m:s Y-m-d');
    }

    public function getCreatedAtAttribute($created_at): string
    {
        return jdate($created_at)->format('H:m:s Y-m-d');
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

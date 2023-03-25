<?php

namespace App\Models;

use App\Support\Traits\HasPassword;
use App\Support\Traits\SlugModel;
use App\Support\Traits\WithBoot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens,WithBoot,HasPassword, InteractsWithMedia, HasFactory,HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone',
        'password',
        'active',
        'social_id',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute(): string
    {
        return $this->getFirstMediaUrl('avatar');
    }
    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('image');
    }
    public function getFirstMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $media = $this->getFirstMedia($collectionName);

        if (! $media) {
            return $this->getFallbackMediaUrl($collectionName) ?: asset('storage/default/user-avatar.png');
        }

        if ($conversionName !== '' && ! $media->hasGeneratedConversion($conversionName)) {
            return $media->getUrl();
        }

        return $media->getUrl($conversionName);
    }

}

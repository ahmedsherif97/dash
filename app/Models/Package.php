<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\SlugModel;
use App\Support\Traits\WithBoot;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Package.
 *
 * @mixin \Eloquent
 */
class Package extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    protected $translatable = ['title', 'description'];
    protected $guarded = [];
    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('image');
    }
}

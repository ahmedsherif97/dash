<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Notification extends Model
{
    use HasTranslations;

    protected $translatable = ['title', 'description'];
    protected $guarded = [];
//    public function getImageAttribute(): string
//    {
//        return $this->getFirstMediaUrl('image');
//    }
}

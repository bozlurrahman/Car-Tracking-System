<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Okami101\LaravelAdmin\Traits\RequestMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class City extends Model implements HasMedia
{
    use HasTranslations;
    use RequestMediaTrait;
    use HasFactory;

    protected $fillable = ['name', 'active', 'description', 'user_id', 'car_id', 'tags'];

    protected $casts = ['active' => 'boolean', 'tags' => 'array'];

    public $translatable = ['description'];

    protected function getLocale(): string
    {
        return request()->header('locale') ?: app()->getLocale();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
        $this->addMediaCollection('images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        //
    }
}

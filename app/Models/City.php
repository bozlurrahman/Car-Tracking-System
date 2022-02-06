<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Okami101\LaravelAdmin\Traits\RequestMediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class City extends Model implements HasMedia
{
    use HasTranslations;
    use RequestMediaTrait;

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

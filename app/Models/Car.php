<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasTranslations, HasFactory;

    protected $fillable = ['category', 'title', 'description', 'summary', 'author', 'price', 'commentable', 'publication_date'];

    protected $casts = ['price' => 'float', 'commentable' => 'boolean', 'publication_date' => 'date'];

    public $translatable = ['description', 'summary'];

    protected function getLocale(): string
    {
        return request()->header('locale') ?: app()->getLocale();
    }
}

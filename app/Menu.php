<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasTranslations, HasTranslatableSlug;

    protected $guarded = ['id'];

    public $timestamps = false;

    public $translatable  = ['title', 'slug'];

    protected $fillable  = ['title', 'slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::createWithLocales( config('translatable.locales') )
            ->generateSlugsFrom(function($model, $locale) {
                return "{$model->title}";
            })
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }

     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

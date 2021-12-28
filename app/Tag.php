<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{

    use HasTranslations, HasTranslatableSlug;

    protected $guarded = ['id'];

    public $translatable    = ['title', 'slug' ];

    protected $fillable     = ['title', 'slug' ];

    public $timestamps = false;
    
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


}


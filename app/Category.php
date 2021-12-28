<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasTranslations, HasTranslatableSlug;

    protected $guarded = ['id'];

    public $timestamps = false;

    public $translatable  = ['title', 'slug', 'color_code'];

    protected $fillable  = ['title', 'slug', 'color_code'];

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
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


    public function category()
    {
        return $this->first();
    }

}

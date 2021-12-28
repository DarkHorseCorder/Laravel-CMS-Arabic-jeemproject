<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;


class Author extends Model
{
    use HasTranslations, HasTranslatableSlug;

    protected $guarded = ['id'];

    public $translatable    = ['title', 'slug', 'info', 'color_code'];

    protected $fillable = [
        'title',
        'slug',
        'info',
        'facebook_link',
        'twitter_link',
        'whatsapp_link',
        'color_code'
    ];

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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($author) { // before delete() method call this
             $author->posts()->delete();
             // do the rest of the cleanup...
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations, HasTranslatableSlug;

    protected $guarded = ['id'];

    public $incrementing = true;

    public $translatable = ['title', 'slug', 'meta_description', 'body'];

    protected $fillable = [
        'title',
        'country',
        'meta_description',
        'body',
        'slug',
        'image_path',
        'user_id',
        'author_id',
        'is_published',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::createWithLocales( ['en', 'ar', 'de'] )
            ->generateSlugsFrom(function($model, $locale) {
                return "{$model->title} {$model->startsAtIso}";
            })
            ->saveSlugsTo('slug');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post' , 'post_id' , 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post' , 'post_id' , 'tag_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}


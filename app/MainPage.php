<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Translatable\HasTranslations;

class MainPage extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'sections',
        'locale',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

}

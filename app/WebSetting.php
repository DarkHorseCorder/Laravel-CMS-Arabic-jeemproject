<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WebSetting extends Model
{
    use HasTranslations;

    protected $guarded = ['id'];

    public $timestamps = false;

    public $translatable  = ['section_a'];

    protected $fillable = [
        'id',
        'name',
        'email',
        'contact_show',
        'contact',
        'address',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkedin_link',
        'youtube_link',
        'whatsapp_link',
    ];

    public function section_a()
    {
        return $this->belongsToMany(Category::class, 'category_post' , 'post_id' , 'category_id');
    }
}

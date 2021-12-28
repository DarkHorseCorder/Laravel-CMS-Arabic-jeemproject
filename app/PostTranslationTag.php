<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PostTranslationTag extends Model
{

    public $timestamps = false;

    public $table = 'post_translation_tag';

    protected $fillable = ['post_id', 'tag_id'];
    
}

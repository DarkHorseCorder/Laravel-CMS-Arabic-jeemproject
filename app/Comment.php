<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Comment extends Model 
{
    use HasTranslations;

    protected $guarded = ['id'];

    public $incrementing = true;

    public $translatable = ['name', 'comment'];

    protected $fillable = [
        'name',
        'email',
        'comment',
        'post_id',
        'avatar_id',
        'avatar_id',
        'is_approve',
    ];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    
    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
    
}

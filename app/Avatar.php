<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{    
    protected $guarded = ['id'];

    public $timestamps = false;
    
    public $incrementing = true;

    protected $fillable = [        
        'name',
        'image_path',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

}

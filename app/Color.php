<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $table = 'colors';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
    ];

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false; 

    protected $fillable = [
        'imdb_id',
        'title',
        'poster'
    ];
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'img','name','slug'
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function indexCategory(){
        return $this->hasOne('App\IndexCategory');
    }
}

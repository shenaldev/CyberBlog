<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexCategory extends Model
{
    /**
     *
     * This class used to manage categories that shoud be display on homepage
     * IndexCategory table have Category id and Is it should be display on homepage ('in_home') column
     *
     */

    protected $fillable = ['category_id','in_home'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Vote extends Model
{
    //
    protected $fillable = ['post_id','user_id','auther_id','vote'];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}

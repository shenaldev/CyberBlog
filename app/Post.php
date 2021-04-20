<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Auth;
use App\Vote;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title','img','content','category_id','user_id','slug'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->BelongsTo('App\User');
    }

    public function getContentChunk($content){
        $html = strip_tags($content);
        $html = html_entity_decode($html);

        return Str::limit($html,200);
    }

    // Total Votes For Post
    public function votes(){
        return $this->hasMany('App\Vote');
    }

    public function likesCount(){
        return $this->votes()->where('vote',1)->count();
    }

    public function dislikesCount(){
        return $this->votes()->where('vote',0)->count();
    }

    // Is Loged User Already Voted To Post
    public function isVoted(){
        return $this->votes()->where('user_id',Auth::id());
    }

}

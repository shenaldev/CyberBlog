<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['avatar','full_name','about','facebook','twitter','instagram','reddit','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Explode Full Name String Into Array And Return
     * First Name And Last Name
     */

    public function fname(){
        $nameArray = explode(" ",$this->full_name);
        return $nameArray[0];
    }

    public function lname(){
        $nameArray = explode(" ",$this->full_name);
        return $nameArray[1];
    }
}

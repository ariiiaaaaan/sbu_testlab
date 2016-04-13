<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    public $timestamps = false;


    public function photo() {

        return $this->hasMany('App\Photo');
    }

    public function tag() {

        return $this->belongsToMany('App\Tag');
    }

    public function records(){
        return $this->hasMany('App\Record');
    }

}
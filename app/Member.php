<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    public $timestamps = false;


    public function photo() {

        return $this->hasOne('App\Photo');
    }

    public function records(){
        return $this->hasMany('App\Record');
    }
}
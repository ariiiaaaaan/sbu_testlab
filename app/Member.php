<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    public function photo() {

        return $this->hasMany('App\Photo');
    }

}
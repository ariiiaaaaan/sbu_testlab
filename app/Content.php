<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    public function photo() {

        return $this->hasMany('App\Photo');
    }

    public function tag() {

        return $this->hasMany('App\Tag');
    }

}
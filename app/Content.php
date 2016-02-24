<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    public function photo() {

        return $this->hasMany('App\Photo');
    }

    public function tags() {

        return $this->hasMany('App\Tag');
    }

    public function events() {
        return $this->hasMany('App\Events');
    }

    public function researches() {
        return $this->hasMany('App\Research');
    }

}
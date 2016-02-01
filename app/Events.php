<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    protected $table = 'events';

    public function photo() {

        return $this->hasMany('App\Photo');
    }

    public function tag() {

        return $this->hasMany('App\Tag');
    }

}
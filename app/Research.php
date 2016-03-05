<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model {
    public $timestamps = false;


    public function photo() {

        return $this->hasMany('App\Photo');
    }

    public function tag() {

        return $this->hasMany('App\Tag');
    }

    public function content() {
        return $this->belongsTo('App\Content');
    }

}
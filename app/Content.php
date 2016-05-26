<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    public $timestamps = false;


    public function photos() {

        return $this->hasMany('App\Photo');
    }

    public function tags() {

        return $this->belongsToMany('App\Tag','tag_content','content_id','tag_id');
    }

    public function event() {
        return $this->hasOne('App\Events');
    }

    public function researches() {
        return $this->hasOne('App\Research');
    }

    public function categories() {

        return $this->belongsToMany('App\Category','category_content','content_id','category_id');
    }

}
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    public function contents() {

        return $this->belongsToMany('App\Content');
    }

    public function events() {

        return $this->belongsToMany('App\Events');
    }

    public function member () {

        return $this->belongsToMany('App\Member');
    }

    public function research () {

        return $this->belongsToMany('App\Research');
    }

}
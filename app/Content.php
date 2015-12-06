<?php

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    public function photo() {

        return $this->hasMany('App\Photo');
    }

}
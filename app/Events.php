<?php

use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    protected $table = 'events';

    public function photo() {

        return $this->hasMany('App\Photo');
    }

}
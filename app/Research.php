<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model {

    public function photo() {

        return $this->hasMany('App\Photo');
    }

}
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    public function content() {

        return $this->belongsTo('App\Content');
    }

    public function events() {

        return $this->belongsTo('App\Events');
    }

    public function member () {

        return $this->belongsTo('App\Member');
    }

    public function research () {

        return $this->belongsTo('App\Research');
    }

}
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    public $timestamps = false;


    public function member() {

        return $this->belongsTo('App\Member');
    }

    public function content() {

        return $this->belongsTo('App\Content');
    }

    public function research() {

        return $this->belongsTo('App\Research');
    }

}
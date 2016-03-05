<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    public $timestamps = false;
    protected $table = 'events';

    public function photo() {
        return $this->hasMany('App\Photo');
    }

    public function content() {
        return $this->belongsTo('App\Content');
    }

}
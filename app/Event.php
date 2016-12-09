<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    public $timestamps = false;
    protected $table = 'events';

    public function getTime(){
        return "date and time";
    }
    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function content() {
        return $this->belongsTo('App\Content');
    }

}
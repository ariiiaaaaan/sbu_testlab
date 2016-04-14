<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    public $timestamps = false;
    protected $table = 'events';

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function contents() {
        return $this->belongsTo('App\Content');
    }

}
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    public $timestamps = false;


    public function member() {

        return $this->belongsTo('App\Member');
    }

}
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    public $timestamps = false;


    public function contents() {

        return $this->belongsToMany('App\Content','tag_content','tag_id','content_id');
    }
}
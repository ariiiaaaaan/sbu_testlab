<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public $timestamps = false;
    public $table = "categories";

    public function contents() {

        return $this->belongsToMany('App\Content','category_content','category_id','content_id');
    }

}
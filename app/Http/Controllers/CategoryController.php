<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;



class CategoryController extends Controller {

    public function updateView(){

    }

    private static function setSuccs(Category $cat){
        $ret = array("id" => $cat->id, "title" => $cat->title, "children" => array());
        $children = Category::where('parent',$cat->id)->get();

        if(count($children) > 0)
            foreach($children as $ch)
                array_push($ret["children"],CategoryController::setSuccs($ch));
        return $ret;
    }

    public static function getTree(){
        $tree = array();
        $roots = Category::where('parent',null)->get();
        foreach($roots as $root){
            array_push($tree,CategoryController::setSuccs($root));
        }
        return $tree;
    }

    public static function justGetAll(){
        return Category::all();
    }

    public function jsonTree(){
        return json_encode($this->getTree());
    }
}
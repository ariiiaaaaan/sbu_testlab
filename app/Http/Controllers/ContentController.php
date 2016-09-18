<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

class ContentController extends Controller {

    public function showContents(Request $r) {
        $content =  Content::find($r->input("id"));
        $lang = $r->session()->get("lang","fa");
        $cats = CategoryController::getTree();
        return view('contents',['content' => $content,'cats' => $cats,'lang' => $lang]);
    }

    public function getRelated($id){
        $content = Content::find($id);
        $ret = Content::where("type",$content->type)->take(3)->get();
        return $ret;
    }

    public function showContent(Request $r) {
        $content =  Content::find($r->input("id"));
//        return var_dump($content);
        $lang = $r->session()->get("lang","fa");
        $rels = ContentController::getRelated($r->input("id"));
        return view('content',['content' => $content,'rels' => $rels,'lang' => $lang]);
    }

}
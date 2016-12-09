<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentController extends Controller {

    public function showContents(Request $r) {
        $contents =  Content::where('type',$r->input("type"))->take(12)->get();
        $lang = $r->session()->get("lang","fa");
        $cats = CategoryController::getTree();
        $hc =new HomeController();
        $vars = $hc->getVars();
        return view('contents',['contents' => $contents,'cats' => $cats,'lang' => $lang,'type' => $r->input("type"),'vars' => $vars]);
    }


    public function showContent(Request $r) {
        $content =  Content::find($r->input("id"));
        $lang = $r->session()->get("lang","fa");
        $rels = $this->getRelatedBlog($content->id);
        $hc =new HomeController();
        $vars = $hc->getVars();
        return view('content',['content' => $content,'related' => $rels,'lang' => $lang,'vars'=>$vars]);
    }

    public function moreContents(Request $r){
        $offset = $r->input("page")*2;
        $contents =  Content::where('type',$r->input("type"))->offset($offset)->take(2)->get();
        return view("morecontent",["contents"=>$contents]);
    }

    public function getRelatedBlog($id){
        $ids = DB::select('call related(?)',array($id));
        if(count($ids)<3)
            return (Content::where("type","blogs")->orWhere("type","didactics")->take(3)->get());
        return (Content::find([$ids[0]->content_id,$ids[1]->content_id,$ids[2]->content_id]));
    }

}
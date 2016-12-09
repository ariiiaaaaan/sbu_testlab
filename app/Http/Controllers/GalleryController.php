<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class GalleryController extends Controller {

    public function showGalleries(Request $r) {
        $hc =new HomeController();
        $vars = $hc->getVars();
        $lang = $r->session()->get("lang","fa");
        $galleries = Content::where("type","galleries")->get();
        return view('galleries',["galleries" => $galleries, "lang"=> $lang,"vars" => $vars]);
    }

    public function showGallery(Request $r){
        $gal =  Content::find($r->input('id'));
        $hc =new HomeController();
        $vars = $hc->getVars();
        $lang = $r->session()->get("lang","fa");
        return view('gallery',["lang"=> $lang, "gallery" => $gal,"vars"=>$vars]);
    }
}
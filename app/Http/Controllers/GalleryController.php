<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class GalleryController extends Controller {

    public function showGalleries() {
        return view('galleries',["lang"=> "en"]);
    }

    public function showGallery(Request $r){
        return view('gallery',["lang"=> "en"]);
    }
}
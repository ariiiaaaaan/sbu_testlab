<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class GalleryController extends Controller {

    public function showGalleries() {
        return view('galleries');
    }

    public function showGallery(Request $r){
        return view('gallery');
    }
}
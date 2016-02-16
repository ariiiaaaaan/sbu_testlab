<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function showBlogs() {
        return view('blogs');
    }

    public function moreBlogs(Request $r){
        return view('moreblogs');
    }
}
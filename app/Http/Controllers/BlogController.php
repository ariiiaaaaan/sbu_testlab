<?php

namespace App\Http\Controllers;

use App\Content;

class BlogController extends Controller {

    public function showBlogs() {
        return view('blogs');
    }
}
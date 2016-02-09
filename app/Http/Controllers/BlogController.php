<?php

namespace App\Http\Controllers;

use App\Content;

class BlogController extends Controller {

    public function blogsPage() {
        return view('blogs');
    }
}
<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function showBlogs() {
        return view('blogs',['catnav' => CategoryController::getTree(),'lang' => 'en']);
    }

    public function moreBlogs(Request $r){
        return view('moreblogs');
    }

}
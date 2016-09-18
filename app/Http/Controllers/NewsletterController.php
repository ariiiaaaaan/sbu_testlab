<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class NewsletterController extends Controller {

    public function showNlMaker(){
        view("nlmaker");
    }
}
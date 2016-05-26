<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Member;
use App\User;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutController extends Controller {

    public function showAbout(Request $r) {

        return view('about');
    }
}
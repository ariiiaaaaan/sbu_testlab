<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller {

    public function authenticate(Request $r) {

        if (Auth::attempt(['title' => 'password','body' => $r->input('password')])) {
            return redirect()->intended('admin');
        }
    }
}
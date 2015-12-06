<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function home()
    {
        return view('welcome', ['salam' => "4" ]);
    }
}
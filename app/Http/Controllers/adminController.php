<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function admin()
    {
        return view('admin');
    }

    public function adminFilter(Request $request)
    {
        return(var_dump($request->input()));
    }
}
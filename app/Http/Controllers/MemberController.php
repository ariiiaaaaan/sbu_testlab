<?php

namespace App\Http\Controllers;

use App\User;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MemberController extends Controller {

    public function fetchMember() {
        $members = DB::table('members')->get();
        return view('members',['members' => $members]);

    }
}
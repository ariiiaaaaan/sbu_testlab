<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Member;
use App\User;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MemberController extends Controller {

    public function showMember(Request $r) {
        $member = Member::where("id",$r->input('member-id'))->get();
        return view('member',['member' => $member[0],"lang" => "fa"]);
    }
}
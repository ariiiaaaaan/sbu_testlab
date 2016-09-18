<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Member;
use App\User;
use App\Content;
use App\Variable;
use App\Events;
use App\Http\Controllers\Controller;

class AboutController extends Controller {

    public function getVars(){
        $vars = Variable::get();
        $var = array();
        foreach($vars as $v){
            $var[$v->title]= array("body" => $v->body, "other" => $v->other);
        }
        $var["months"]=array("فروردین","اردیبهشت","خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند");
        return $var;
    }

    public function showAbout(Request $r) {

        $var = $this->getVars();
        $content = array();
        $content["services"] = Content::where('type','=','services')->get();
        $content["fields"] = Content::where('type','=','fields')->get();
        $events = Events::get();
        $content["blogs"] = Content::where('type','=','blogs')->orderBy("date_created","desc")->take(3)->get();
        $content["members"] = Member::get();
        $content["didactics"] = Content::where('type','=','didactics')->orderBy("date_created","desc")->take(3)->get();
        $content["resources"] = Content::where('type','=','resources')->orderBy("date_created","desc")->take(3)->get();
        $content["galleries"] = Content::where('type','=','galleries')->orderBy("date_created","desc")->take(3)->get();
        $services = Content::where('type','=','services')->get();
//        dd($content);
        $lang = "fa";
        return view('about',["content" => $content, "var" => $var, "lang" => $lang]);
    }

    public function autoScroll(){
        return view('scroll');
    }
}
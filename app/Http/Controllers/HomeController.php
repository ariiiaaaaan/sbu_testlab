<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Member;
    use App\User;
    use App\Content;
    use App\Variable;
    use App\Events;
    use App\Http\Controllers\Controller;
    use \Illuminate\Support\Facades\DB;



class HomeController extends Controller {

    public function getVars(){
        $vars = Variable::get();
        $var = array();
        foreach($vars as $v){
            $var[$v->section]= array("title" => $v->title,"subtitle" => $v->subtitle,"body" => $v->body);
        }
        $var["months"]=array("فروردین","اردیبهشت","خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند");
        return $var;
    }

    public function showHomePage(Request $r) {

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
        $lang = $r->session()->get("lang","fa");
        return view('home',["content" => $content, "var" => $var, "lang" => $lang]);
    }

    public function setLang(Request $r){
        $r->session()->put("lang", $r->input("lang")=='en' ? "en" :"fa");
        return redirect("/");
    }
}
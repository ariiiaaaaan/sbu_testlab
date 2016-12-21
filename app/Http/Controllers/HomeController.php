<?php

namespace App\Http\Controllers;

    use App\Research;
    use Illuminate\Http\Request;
    use App\Member;
    use App\Content;
    use App\Variable;
    use App\Event;
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
        $events = Event::get();
        $content["blogs"] = Content::where('type','=','blogs')->orderBy("date_created","desc")->take(3)->get();
        $content["members"] = Member::orderBy('position','desc')->get();
        $content["didactics"] = Content::where('type','=','didactics')->orderBy("date_created","desc")->take(3)->get();
        $content["resources"] = Content::where('type','=','resources')->orderBy("date_created","desc")->take(3)->get();
        $content["galleries"] = Content::where('type','=','galleries')->orderBy("date_created","desc")->take(3)->get();
        $content["companies"] = Content::where('type','=','companies')->orderBy("date_created","desc")->get();
        $content["researchesours"] = Content::where('type','=','researches')->whereHas('research' , function ($query) {
            $query->where('external',0);
        })->orderBy("date_created","desc")->take(2)->get();
        $content["researchesexternal"] = Content::where('type','=','researches')->whereHas('research', function ($query) {
            $query->where('external',1);
        })->orderBy("date_created","desc")->take(2)->get();
        $services = Content::where('type','=','services')->get();
//        dd($content);
        $lang = $r->session()->get("lang","fa");
//        if($lang == "en")
//            return view("testhome",["content" => $content, "var" => $var, "lang" => $lang]);
        return view('home',["content" => $content, "var" => $var, "lang" => $lang]);
    }

    public function showAbout(Request $r) {

        $var = $this->getVars();
        $content = array();
        $content["members"] = Member::get();
        $content["tools"] = Content::where('type','=','tools')->orderBy("date_created","desc")->take(3)->get();
        $content["researches"] = Research::where('external','=',false)->take(2)->get();
        $content["researchereas"] = explode('#',$var["research"]["body"]);
        $content["researchesours"] = Content::where('type','=','researches')->whereHas('research' , function ($query) {
            $query->where('external',0);
        })->orderBy("date_created","desc")->take(2)->get();
        $lang = $r->session()->get("lang","fa");
        if($lang == "en")
            return view("test.about",["content" => $content, "var" => $var, "lang" => $lang]);
        return view('about',["content" => $content, "var" => $var, "lang" => $lang]);
    }

    public function setLang(Request $r){
        $r->session()->put("lang", $r->input("lang")=='en' ? "en" :"fa");
        return redirect("/");
    }

    public function search(Request $r){
        $lang = $r->session()->get("lang","fa");
        $query = $r->input("query");
        if(strlen($query)<2)
         return view("error",["messega"=>"Search Query must be at least 2 characters"]);
        $result = Content::where("title","like","%".$query."%")->get();
        $types = array();
        foreach($result as $res){
            $types[$res->type] = $res->farsiType();
        }
        array_unique($types);
        $var = $this->getVars();
        return view("searchresult",["query"=>$query,"result"=>$result,"types" => $types,"lang"=>$lang,"vars"=>$var]);
    }
}
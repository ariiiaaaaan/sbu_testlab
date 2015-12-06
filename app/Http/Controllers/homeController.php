<?php

namespace App\Http\Controllers;

    use App\User;
    use App\Content;
    use App\Http\Controllers\Controller;
    use \Illuminate\Support\Facades\DB;



class HomeController extends Controller {

    public function home()
    {
        return view('welcome', ['salam' => "4" ]);
    }
    
    public function showHomePage() {
        //blog and news
        $blog = Content::where('type','=','blog')->get();
        $news = Content::where('type','=','news')->get();
        $tutorials = Content::where('type','=','tutorials')->get();
        $services = Content::where('type','=','services')->get();
        $events = Events::get();
        return view('home',['blogs' => $blog , 'news' => $news , 'tutorials' => $tutorials , 'services' => $services , 'events' => $events]);
    }
}
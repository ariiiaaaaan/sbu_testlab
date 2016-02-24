<?php
namespace App\Http\Controllers;

use App\User;
use App\Content;
use App\Events;
use App\Research;
use App\Member;
use App\Tag;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class AdminController extends Controller {

    public function selectFrom($table, $type, $tag = NULL, $offset = NULL, $limit = NULL) {

        $result = NULL;

        if($table == 'content') {
            if($tag != NULL) {
                $result = DB::table('tags')
                    ->join('tag_content','tags.id','=','tag_content.tag_id')
                    ->join('contents','tag_content.id','=','contents.content_id')
                    ->select('contents.*')
                    ->where('tags.title','=',$tag)
                    ->where('contents.type','=',$type)
                    ->get();
            } else {
                $result = DB::table('contents')
                            ->where('type','=',$type)
                            ->get();
            }
        } elseif($table = 'events') {
            if($tag != NULL) {
                $result = DB::table('tags')
                    ->join('tag_event','tags.id','=','tag_event.tag_id')
                    ->join('events','tag_event.event_id','=','events.id')
                    ->select('events.*')
                    ->where('tags.title','=',$tag)
                    ->get();
            } else {
                $result = DB::table('events')
                    ->select('events.*')
                    ->get();
            }
        } elseif($table = 'researchs') {
            if($tag != NULL) {
                $result = DB::table('researchs')
                    ->join('tag_event','tags.id','=','tag_research.tag_id')
                    ->join('researchs','tag_research.research_id','=','researchs.id')
                    ->select('research.*')
                    ->where('tags.title','=',$tag)
                    ->get();
            } else {
                $result = DB::table('researchs')
                    ->select('researchs.*')
                    ->get();
            }
        }
        return $result;
    }

    public function getInsertForm(Request $r){
//       return "salam";
//        return $r->input('entity')."".$r->input('type');
        $tags = Tag::all();
        return view('newcontentmodal',['entity'=>$r->input('entity'),'type'=>$r->input('type'),'tags'=>$tags]);
    }

    public function admin() {
        /*if(Auth::check()) {
            return view('admin');
        } else {
            return view('adminlogin');
        }*/
        return view('admin');
//        $services = $this->selectFrom('content','services');
//        $blogs = $this->selectFrom('content','blogs');
//        $news = $this->selectFrom('content','news');
//        $companies = $this->selectFrom('content','companies');
//        $members = $this->selectFrom('member');
//        $researches = $this->selectFrom('research');
//        $events = $this->selectFrom('event');
//        return view('admin',array('services' => $services,'blogs' => $blogs,'news' => $news,'companies'=>$companies,'members' => $members,'researches' => $researches, 'events' => $events));
    }

    public function adminFilter(Request $request) {
        //return view('dateinput',['prefix'=>"salam"]);
        $this->insertQuery($request->input('type'),$request);
    }

    public function insertQuery($type,Request $request)
    {

        if ($type == 'events') {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'address' => 'required',
                'year' => 'required',
                'month' => 'required',
                'day' => 'required',
                'body' => 'required',
                'start' => 'required',
                'end' => 'required',
                'highlight' => 'required'
            ]);

                if ($validator->fails()) {
                    return redirect('admin')->withErrors($validator)->withInput();
                } else {
                    $content = new Events;
                    $content->title = $request->input('title');
                    $content->address = $request->input('address');
                    $content->body = $request->input('body');
                    $start = $request->input('sday') . "|" . $request->input('smonth') . "|" . $request->input('syear') . "|" . $request->input('shour') . ":" . $request->input('sminute');
                    $end = $request->input('eday') . "|" . $request->input('emonth') . "|" . $request->input('eyear') . "|" . $request->input('ehour') . ":" . $request->input('eminute');
                    $content->start = $start;
                    $content->end = $end;
                    $content->highlight = $request->input('highlight');
                    $photo = new Photo;
                    if($request->file('photo')->isValid()) {
                        $file = $request->file('photo');
                        $name = $file->getClientOriginalName() ."--". date("1");
                        $destination = 'upload';
                        $file->move($destination,$name);
                        $photo->title = $request->input('photoTitle');
                        $photo->path = $destination."/".$name;
                    }
                    $content->save();
                    $content->photos()->save($photo);
                    return redirect('admin');
                }
        } elseif ($type = 'content') {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'type' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('admin')->withErrors($validator)->withInput();
            } else {
                $content = new Content;
                $content->title = $request->input('title');
                $content->body = $request->input('body');
                $content->type = $type;
                $content->save();
                return redirect('admin');
            }
        }
    }
}
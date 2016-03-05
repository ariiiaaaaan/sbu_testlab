<?php
namespace App\Http\Controllers;

use App\User;
use App\Content;
use App\Events;
use App\Research;
use App\Member;
use App\Tag;
use Illuminate\Support\Facades\Session;
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
        $this->insertQuery($request->input('type'),$request->input('tag'),$request);
    }

    public function insertQuery(Request $request)
    {
        $type = $request->input('type');
        $tag = $request->input('tag');
        if ($type == 'events') {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'address' => 'required',
                'body' => 'required',
                'tag' => 'required',
                'img' => 'required'
            ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with('errorcode','events');
                } else {
                    $event = new Events;
                    $content = new Content;
                    $content->title = $request->input('title');
                    $event->address = $request->input('address');
                    $content->body = $request->input('body');
                    $content->type = $type;
                    $content->save();
                    $start = $request->input('start-day') . "|" . $request->input('start-month') . "|" . $request->input('start-year') . "|" . $request->input('start-hour') . ":" . $request->input('start-minute');
                    $end = $request->input('end-day') . "|" . $request->input('end-month') . "|" . $request->input('end-year') . "|" . $request->input('end-hour') . ":" . $request->input('end-minute');
                    $event->start = $start;
                    $event->end = $end;
                    $event->highlight = $request->input('hightlight') == NULL ? 0 : 1;
                    $uploadCount = 0;
                    $filesCount = 0;

                    if ($request->file('img')->isValid()) {
                        $files = $request->file('img');
                        $filesCount = count($files);

                        foreach ($files as $file) {
                            if ($file->isValid()) {
                                $photo = new Photo;
                                $name = $file->getClientOriginalName() . "--" . date("1");
                                $destination = 'upload';
                                $file->move($destination, $name);
                                $uploadCount++;
                                $photo->title = $request->input('photoTitle');
                                $photo->path = $destination . "/" . $name;
                                $content->photos()->save($photo);
                            }
                        }
                    }
                    foreach ($tag as $insertTag) {
                        $row = Tag::where('title', '=', $insertTag)->first();
                        $content->tags()->save($row);
                    }
                    $event->content()->associate($content);
                    if ($uploadCount == $filesCount) {
                        $request->session()->flash('success', 'Upload successfully');
                    }
                    $event->save();
                    return redirect('admin');
                }
        }
         elseif ($type = 'services') {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'type' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('admin')->withErrors($validator)->withInput();
            } else {
                $event = new Content;
                $event->title = $request->input('title');
                $event->body = $request->input('body');
                $event->type = $type;
                $event->save();
                return redirect('admin');
            }
        }
    }
}
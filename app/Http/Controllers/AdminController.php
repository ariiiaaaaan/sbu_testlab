<?php
namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Content;
use App\Events;
use App\Research;
use App\Member;
use App\Tag;
use App\Photo;
use App\Record;
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
        $tags = Tag::all();
        $cats =  Category::all();
        return view('newcontentmodal',['entity'=>$r->input('entity'),'type'=>$r->input('type'),'mode' => 1 ,'tags'=>$tags,'cats'=>$cats]);
    }

    public function showEditForm(Request $r){

        $type = $r->input('type');
        $id = $r->input('id');
        if($type == 'events') {
            $old = Content::find($id)->event;
        }
        $tags = Tag::all();
        $cats =  Category::all();
        return view('edit',['entity'=>$r->input('entity'),'type'=>$r->input('type'),'tags'=>$tags,'cats'=>$cats,'old' => $old]);
    }

    public function getAdminTable(Request $r){
        $items = array();
        $member = false;
        switch ($r->input("entity")){
            case "contents":
                $items = Content::where("type",$r->input("type"))->simplePaginate(10);
                break;
            case "members":
                $items = Member::simplePaginate(10);
                $member = true;
                break;
            case "contacts":
                echo "contacts";
                break;
            default:
                echo "unknown type";
        }
        return view('admintable',['type' => $r->input('type') ,'entity' => $r->input('entity'), 'items' => $items,'member' => $member]);
    }

    public function returnTags() {
        $tags = Tag::all();
        return $tags;
    }

    public function admin() {
        /*if(Auth::check()) {
            return view('admin');
        } else {
            return view('adminlogin');
        }*/
        return view('admin')->with(array('tags' => $this->returnTags()));
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
        $tag = $request->input('tags');
        $id = $request->input('id');
        $mode = $request->input('mode');

        ////////////////////////////////////
        //mode = 0 edit , mode = 1 insert///
        ////////////////////////////////////

        if ($type == 'events') {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'address' => 'required',
                'body' => 'required',
                'tags' => 'required|array'
            ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'events' , 'tags' => $this->returnTags()));
                } else {

                    if($mode == 1) {
                        $event = new Events;
                        $content = new Content;
                    } else {
                        $content = Content::where('id','=',$id);
                        $event = Events::where('content_id','=',$id);
                    }
                    $content->title = $request->input('title');
                    $event->address = $request->input('address');
                    $content->body = $request->input('body');
                    $content->type = $type;
                    $content->save();
                    $start = $request->input('start-day') . "|" . $request->input('start-month') . "|" . $request->input('start-year') . "|" . $request->input('start-hour') . ":" . $request->input('start-minute');
                    $end = $request->input('end-day') . "|" . $request->input('end-month') . "|" . $request->input('end-year') . "|" . $request->input('end-hour') . ":" . $request->input('end-minute');
                    $event->start = $start;
                    $event->end = $end;
                    $event->highlight = $request->input('highlight') == NULL ? 0 : 1;
                    $files = $request->file('img');

                    foreach ($files as $file) {
                        if ($file->isValid()) {
                            $photo = new Photo;
                            $tempName = $file->getClientOriginalName();
                            $extension = explode(".",$tempName);
                            $name = $extension[0]."-".time().".".$extension[1];
                            $destination = 'upload';
                            $file->move($destination, $name);
                            $photo->path = $destination . "/" . $name;
                            $content->photos()->save($photo);
                        }
                    }
                    foreach ($tag as $insertTag) {
                        $row = Tag::where('title', '=', $insertTag)->first();
                        $content->tags()->save($row);
                    }
                    //$cat = Category::where('title', '=', $request->input('category'))->first();
                    //$content->categories()->save($cat);

                    $content->event()->save($event);
                    return redirect('admin');
                }
        } elseif ($type == 'members') {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'members' , 'tags' => $this->returnTags()));
            } else {
                $member = new Member;
                $member->firstname = $request->input('firstname');
                $member->lastname = $request->input('lastname');
                $member->email = $request->input('email');
                $member->body = $request->input('body') == NULL ? NULL : $request->input('body');
                //$member->password = $request->input('password');
                $member->researchareas = $request->input('researchareas') == NULL ? NULL : $request->input('researchareas');
                $member->interests = $request->input('interests') == NULL ? NULL : $request->input('interests');
                $member->tel = $request->input('telephone') == NULL ? NULL : $request->input('telephone');
                $member->mobile = $request->input('mobile') == NULL ? NULL : $request->input('mobile');
                $member->position = $request->input('position') == NULL ? NULL : $request->input('position');
                $member->pinterest = $request->input('pinterest') == NULL ? NULL : $request->input('pinterest');
                $member->facebook = $request->input('facebook') == NULL ? NULL : $request->input('facebook');
                $member->instagram = $request->input('instagram') == NULL ? NULL : $request->input('instagram');
                $member->linkedin = $request->input('linkedin') == NULL ? NULL : $request->input('linkedin');
                $member->save();

                if($request->hasFile('img')) {
                    $file = $request->file('img');
                    if ($file->isValid()) {
                        $photo = new Photo;
                        $tempName = $file->getClientOriginalName();
                        $extension = explode(".",$tempName);
                        $name = $extension[0]."-".time().".".$extension[1];
                        $destination = 'upload';
                        $file->move($destination, $name);
                        //$photo->title = $request->input('photoTitle');
                        $photo->path = $destination . "/" . $name;
                        $member->photos()->save($photo);
                    }
                }

                $recordArray = $request->input('rec');
                foreach($recordArray as $key) {
                    $record = new Record;
                    $record->institute = $key['institute'];
                    $record->position = $key['position'];
                    $record->start = $key['start'];
                    $record->end = $key['end'];
                    $record->type = $key['type'];
                    $member->records()->save($record);
                }
                // $cat = Category::where('title', '=', $request->input('category'))->first();
                return redirect('admin');
            }
        } elseif ($type == 'researches') {

            $validator = Validator::make($request->all(), [
                'author' => 'required',
                'path' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'researches' , 'tags' => $this->returnTags()));
            } else {
                $research = new Research;
                $content = new Content;
                $content->title = $request->input('title');
                $research->author = $request->input('author');
                $content->body = $request->input('body');
                $content->type = $type;
                $content->save();
                $research->publisher = $request->input('publisher') == NULL ? NULL : $request->input('publisher');
                $date = $request->input('date-year')."-".$request->input('date-month')."-".$request->input('date-day')."-".$request->input('date-hour').":".$request->input('date-minute');
                $research->date = $date;
                $research->pages = $request->input('pages') == NULL ? NULL : $request->input('pages');
                $research->abstract = $request->input('abstract') == NULL ? NULL : $request->input('abstract');
                $research->keywords = $request->input('keywords') == NULL ? NULL : $request->input('keywords');
                $research->refrences = $request->input('refrences') == NULL ? NULL : $request->input('refrences');
                $files = $request->file('img');
                $path = $request->file('path');
                if ($path->isValid()) {
                    $tempName = $path->getClientOriginalName();
                    $extension = explode(".",$tempName);
                    $name = $extension[0]."-".date(DATE_ATOM).".".$extension[1];
                    $destination = 'upload';
                    $path->move($destination, $name);
                    $research->path = $destination . "/" .$name;
                }
                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $photo = new Photo;
                        $tempName = $file->getClientOriginalName();
                        $extension = explode(".",$tempName);
                        $name = $extension[0]."-".time().".".$extension[1];
                        $destination = 'upload';
                        $file->move($destination, $name);
                        //$photo->title = $request->input('photoTitle');
                        $photo->path = $destination . "/" . $name;
                        $content->photos()->save($photo);
                    }
                }
                foreach ($tag as $insertTag) {
                    $row = Tag::where('title', '=', $insertTag)->first();
                    $content->tags()->save($row);
                }
                //$cat = Category::where('title', '=', $request->input('category'))->first();
                //$content->categories()->save($cat);
                $research->content()->associate($content);
                $research->save();
                return redirect('admin');
            }
        } elseif ($type == 'galleries') {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'galleries' , 'tags' => $this->returnTags()));
            } else {
                $content = new Content;
                $content->title = $request->input('title');
                $content->body = $request->input('body');
                $content->type = $type;
                $content->save();
                $file = $request->file('img');
                for ($i=0;$i<count($file);$i++) {
                    if ($file[$i]->isValid()) {
                        $photo = new Photo;
                        $tempName = $file[$i]->getClientOriginalName();
                        $extension = explode(".",$tempName);
                        $name = $extension[0]."-".time().".".$extension[1];
                        $destination = 'upload';
                        $file[$i]->move($destination, $name);
                        $photo->title = $request->input('imgtitle')[$i];
                        $photo->path = $destination . "/" . $name;
                        $content->photos()->save($photo);
                    }
                }
                foreach ($tag as $insertTag) {
                    $row = Tag::where('title', '=', $insertTag)->first();
                    $content->tags()->save($row);
                }
                //$cat = Category::where('title', '=', $request->input('category'))->first();
                //$content->categories()->save($cat);
                return redirect('admin');
            }
        }
        else {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'tags' => 'required|array'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'news' , 'tags' => $this->returnTags()));
            }
            else {
                $news = new Content;
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $news->type = $type;
                $news->save();
                if($request->hasFile('img')) {
                    $files = $request->file('img');

                    foreach ($files as $file) {
                        if ($file->isValid()) {
                            $photo = new Photo;
                            $tempName = $file->getClientOriginalName();
                            $extension = explode(".",$tempName);
                            $name = $extension[0]."-".time().".".$extension[1];
                            $destination = 'upload';
                            $file->move($destination, $name);
                            //$photo->title = $request->input('photoTitle');
                            $photo->path = $destination . "/" . $name;
                            $news->photos()->save($photo);
                        }
                    }
                }
                foreach ($tag as $insertTag) {
                    $row = Tag::where('title', '=', $insertTag)->first();
                    $news->tags()->save($row);
                }
                return redirect('admin');
            }
        }
    }

    public function editQuery(Request $request) {

    }
}
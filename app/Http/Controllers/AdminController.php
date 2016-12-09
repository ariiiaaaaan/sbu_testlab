<?php
namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Content;
use App\Event;
use App\Research;
use App\Member;
use App\Tag;
use App\Photo;
use App\Record;
use App\Variable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function showLogin() {
        return view('adminlogin');
    }

    public function doLogin(Request $request) {
        $input=$request->all();
        $password=$input['password'];
        //return $password;
        if(Auth::attempt(['email'=>'arian@google.com','password'=>$password])){
            return redirect()->intended('admin');
        } else {
            return redirect('adminlogin');
        }
    }

    public function doLogout() {
        Auth::logout();
        return redirect('adminlogin');
    }

    public function getInsertForm(Request $r){
        $tags = Tag::all();
        $catcon = new CategoryController();
        $cats = $catcon->getTree();
        return view('newcontentmodal',['entity'=>$r->input('entity'),'type'=>$r->input('type'),'mode' => 1 ,'tags'=>$tags,'cats'=>$cats]);
    }

    public function showEditForm(Request $r){

        $type = $r->input('type');
        $id = $r->input('id');
        if($type == 'events') {
            $old = Content::find($id)->event;
        } else if ($type == 'researches') {
            $old = Content::find($id)->research;
        } else if ($type == 'members') {
            $old = Member::find($id);
        } else if ($type == 'variables') {
            $old = Variable::find($id);
        }else {
            $old = Content::find($id);
        }
        $tags = Tag::all();
        $catcon = new CategoryController();
        $cats = $catcon->getTree();
        return view('edit',['entity'=>$r->input('entity'),'type'=>$r->input('type'),'tags'=>$tags,'cats'=>$cats,'old' => $old]);
    }

    public function delete(Request $r) {
        $type = $r->input('type');
        $id = $r->input('id');

        if($type == 'categories') {
            $index = Category::find($id);
            $pa = $index->parent;
            $children = Category::where('parent',$id)->get();
            foreach($children as $child){
                $child->parent = $pa;
                $child->save();
            }
            $index->delete();
            return redirect('admin');
        } else if($type == 'researches') {
            $index = Content::find($id)->researches;
            $index->delete();
            $index = Content::find($id);
            $index->delete();
            return redirect('admin');
        } else if($type == 'events') {
            $index = Content::find($id)->events;
            $index->delete();
            $index = Content::find($id);
            $index->delete();
            return redirect('admin');
        } else if($type == 'members') {
            $index = Member::find($id);
            $index->delete();
            return redirect('admin');
        } else if($type == 'tags') {
            $index = Tag::find($id);
            $index->delete();
        } else {
            $index = Content::find($id);
            $index->delete();
        }

        return redirect('admin');
    }

    public function getAdminTable(Request $r){
        $items = array();
        $query = $r->input("query","");
        $sort = $r->input("sort","id");
        $asc = "DESC";
        if($sort == "old" || $sort == "title") $asc = "ASC";
        if($sort != "title") $sort = "id";
        switch ($r->input("entity")){
            case "contents":
                $items = Content::where("type",$r->input("type"))->where("title","like","%".$query."%")->orderBy($sort,$asc)->simplePaginate(10);
                break;
            case "members":
                $items = Member::where("firstname","like","%".$query."%")->orWhere("lastname","like","%".$query."%")->orderBy($sort,$asc)->simplePaginate(10);
                break;
            case "variables":
                $items = Variable::where("title","like","%".$query."%")->orderBy($sort,$asc)->simplePaginate(10);
                break;
            case "tags":
                $items =  Tag::where("title","like","%".$query."%")->orderBy($sort,$asc)->simplePaginate(20);
                break;
            case "categories":
                $catcon = new CategoryController();
                $items = $catcon->getTree();
                break;
            default:
                echo "unknown type";
        }
        return view('admintable',['type' => $r->input('type') ,'entity' => $r->input('entity'), 'items' => $items]);
    }

    public function returnTags() {
        $tags = Tag::all();
        return $tags;
    }

    public function admin($lang = "fa") {
        /*if(Auth::check()) {
            return view('admin');
        } else {
            return view('adminlogin');
        }*/
        return view('admin')->with(array('tags' => $this->returnTags(),"lang" => $lang));
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
                        $event = new Event;
                        $content = new Content;
                    } else {
                        $event = Event::find($id);
                        $content = $event->content;
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
                    if(!empty($tag)) {
                        foreach ($tag as $insertTag) {
                            $row = Tag::where('title', '=', $insertTag)->first();
                            $content->tags()->save($row);
                        }
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
                if($mode == 1) {
                    $member = new Member;
                } else {
                    $member = Member::find($id);
                }
                $member->firstname = $request->input('firstname');
                $member->lastname = $request->input('lastname');
                $member->email = $request->input('email');
                //$member->password = $request->input('password');
                $member->researchareas = $request->input('researchareas') == NULL ? NULL : $request->input('researchareas');
                $member->industrialareas = $request->input('intery') == NULL ? NULL : $request->input('industry');
                $member->tel = $request->input('telephone') == NULL ? NULL : $request->input('telephone');
                $member->mobile = $request->input('mobile') == NULL ? NULL : $request->input('mobile');
                $member->position = $request->input('position') == NULL ? NULL : $request->input('position');
                $member->googleplus = $request->input('googleplus') == NULL ? NULL : $request->input('pinterest');
                $member->facebook = $request->input('facebook') == NULL ? NULL : $request->input('facebook');
                $member->twitter = $request->input('twitter') == NULL ? NULL : $request->input('instagram');
                $member->linkedin = $request->input('linkedin') == NULL ? NULL : $request->input('linkedin');

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
                        Photo::where("member_id",$member->id)->delete();
                        $member->photo()->save($photo);
                    }
                }

                if($request->hasFile('cv')) {
                    $file = $request->file('cv');
                    if ($file->isValid()) {
                        $tempName = $file->getClientOriginalName();
                        $extension = explode(".",$tempName);
                        $name = $extension[0]."-".time().".".$extension[count($extension)-1];
                        $destination = 'upload';
                        $file->move($destination, $name);
                        $member->cv = $destination . "/" . $name;
//                        $member->photo()->save($photo);
                    }
                }
                $member->save();
                if($mode == 0) {
                    $record = Member::find($id)->records;
                    foreach($record as $rec) {
                        $rec->delete();
                    }
                }
                $recordArray = $request->input('rec');
                if(!empty($recordArray))
                foreach($recordArray as $key) {
                    if(empty($key['delete']))
                        $key['delete'] = 'off';
                    if($key['delete'] != "on" && $key['institute'] != "") {
                        $record = new Record;
                        $record->institute = $key['institute'];
                        $record->position = $key['position'];
                        $record->start = $key['start'];
                        $record->end = $key['end'];
                        $record->type = $key['type'];
                        $member->records()->save($record);
                    }
                }
                // $cat = Category::where('title', '=', $request->input('category'))->first();
                return redirect('admin');
            }
        } elseif ($type == 'researches') {

            $validator = Validator::make($request->all(), [
                'author' => 'required',
                'title' => 'required',
                'abstract' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'researches' , 'tags' => $this->returnTags()));
            } else {
                if($mode == 1) {
                    $research = new Research;
                    $content = new Content;
                } else {
                    $research = Research::find($id);
                    $content = $research->content;
                }
                $content->title = $request->input('title');
                $content->body = $request->input('abstract');
                $content->type = $type;
                $content->save();
                $research->author = $request->input('author');
                $research->publisher = $request->input('publisher') == NULL ? NULL : $request->input('publisher');
                $date = $request->input('date-year')."|".$request->input('date-month')."|".$request->input('date-day')."|".$request->input('date-hour').":".$request->input('date-minute');
                $research->date = $date;
                $research->external = $request->input("external") == NULL ? true : false;
                $research->pages = $request->input('pages') == NULL ? NULL : $request->input('pages');
//                $research->abstract = $request->input('abstract') == NULL ? NULL : $request->input('abstract');
                $research->keywords = $request->input('keywords') == NULL ? NULL : $request->input('keywords');
                $research->link = $request->input('link') == NULL ? NULL : $request->input('link');
                $path = $request->file('path');
                if (!empty($path) && $path->isValid()) {
                    $tempName = $path->getClientOriginalName();
                    $extension = explode(".",$tempName);
                    $name = $extension[0].time().$extension[count($extension)-1];
                    $destination = 'upload';
                    $path->move($destination, $name);
                    $research->path = $destination . "/" .$name;
                }

                if(!empty($tag)) {
                    foreach ($tag as $insertTag) {
                        $row = Tag::where('title', '=', $insertTag)->first();
                        $content->tags()->save($row);
                    }
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
                if($mode ==1) {
                    $content = new Content;
                } else {
                    $content = Content::find($id);
                }
                $content->title = $request->input('title');
                $content->body = $request->input('body');
                $content->type = $type;
                $content->save();
                    if($request->hasFile('img')) {
                        $file = $request->file('img');
                        for ($i = 0; $i < count($file); $i++) {
                            if ($file[$i]->isValid()) {
                                $photo = new Photo;
                                $tempName = $file[$i]->getClientOriginalName();
                                $extension = explode(".", $tempName);
                                $name = $extension[0] . "-" . time() . (string)$i. "." . $extension[count($extension)-1];
                                $destination = 'upload';
                                $file[$i]->move($destination, $name);
                                $photo->title = $request->input('imgtitle')[$i];
                                $photo->path = $destination . "/" . $name;
                                $photo->highlight = $request->input("highlight")[$i] == "true" ? 1 : 0;
                                $content->photos()->save($photo);
                            }
                        }
                    }
                if($mode != 1) {
                    if (!empty($request->input('oldimg'))) {
                        foreach ($request->input('oldimg') as $img) {
                            if (empty($img['delete'])) {
                                $img['delete'] = "off";
                                $image = Photo::find($img['id']);
                                $image->title = $img['title'];
                                $image->highlight = ($img['highlight'] == "true") ? 1 : 0 ;
                                $image->save();
                            }
                            if ($img['delete'] == "on") {
                                $temp = Photo::find($img['id']);
                                $temp->delete();
                            }
                        }
                    }
                }
                if(!empty($tag)) {
                    foreach ($tag as $insertTag) {
                        $row = Tag::where('title', '=', $insertTag)->first();
                        $content->tags()->save($row);
                    }
                }
                //$cat = Category::where('title', '=', $request->input('category'))->first();
                //$content->categories()->save($cat);
                return redirect('admin');
            }
        } elseif ($type == 'tags') {
            $input = $request->all();
            $split = explode("#",$input['body']);
            for($i=0;$i<count($split);$i++) {
                if(!empty($split[$i]) && $split[$i] != '') {
                    $tag = new Tag;
                    $tag->title = trim($split[$i]);
                    $tag->save();
                }
            }
            return redirect('admin');
        } elseif ($type == 'categories') {
            $cat = new Category();
            $cat->title = $request->input("title");
            $cat->parent = $request->input("cat-id");
            $cat->save();
            return redirect('admin');
        } elseif($type == "variables"){
            $var =  Variable::find($id);
            $var->title = $request->input("title");
            $var->subtitle = $request->input("subtitle");
            $var->body = $request->input("body");
            if($request->hasFile('img')) {
                $file = $request->file('img');
                if ($file->isValid()) {
                    $tempName = $file->getClientOriginalName();
                    $extension = explode(".", $tempName);
                    $name = $extension[0] . "-" . time() . "." . $extension[1];
                    $destination = 'upload';
                    $file->move($destination, $name);
                    //$photo->title = $request->input('photoTitle');
                    $var->body = $destination . "/" . $name;
                }
            }
            $var->save();
            return redirect('admin');
        }else {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'tags' => 'required|array'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(array('errorcode' => 'news' , 'tags' => $this->returnTags()));
            }
            else {
                if($mode ==1) {
                    $news= new Content;
                } else {
                    $news = Content::find($id);
                }
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $news->type = $type;
                $news->save();
                if($request->hasFile('img')) {
                    $files = $request->file('img');
                    if($mode == 0)
                    {
                        $oldphoto = Photo::where("content_id",$id)->first();
                        $oldphoto->delete();
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
                            $news->photos()->save($photo);
                        }
                    }
                }
                if(!empty($tag)) {
                    foreach ($tag as $insertTag) {
                        $row = Tag::where('title', '=', $insertTag)->first();
                        $news->tags()->save($row);
                    }
                }
                return redirect('admin');
            }
        }
    }

}
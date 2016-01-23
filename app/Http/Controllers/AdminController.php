<?php
namespace App\Http\Controllers;

use App\User;
use App\Content;
use App\Events;
use App\Research;
use App\Member;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class AdminController extends Controller {

    public function selectFrom($table,$type = null) {
        $result = null;
        if($table == 'content') {
            $result = Content::where('type','=',$type)->get();
        } elseif ($table == 'event') {
            $result = Events::all();
        } elseif ($table == 'research') {
            $result = Research::all();
        } elseif ($table == 'member') {
            $result = Member::all();
        }
        return $result;
    }

    public function admin() {
        /*if(Auth::check()) {
            return view('admin');
        } else {
            return view('adminlogin');
        }*/
        $services = $this->selectFrom('content','services');
        $blogs = $this->selectFrom('content','blogs');
        $news = $this->selectFrom('content','news');
        $companies = $this->selectFrom('content','companies');
        $members = $this->selectFrom('member');
        $researches = $this->selectFrom('research');
        $events = $this->selectFrom('event');
        return view('admin',array('services' => $services,'blogs' => $blogs,'news' => $news,'companies'=>$companies,'members' => $members,'researches' => $researches, 'events' => $events));
    }

    public function adminFilter(Request $request) {
        return(var_dump($request->input()));
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
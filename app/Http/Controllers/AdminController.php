<?php
namespace App\Http\Controllers;

use App\User;
use App\Content;
use App\Events;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class AdminController extends Controller {

    public function insertQuery($type) {

        if($type == "events") {

            $content = new Events;
            $content->title = Input::get('title');
            $content->address = Input::get('address');
            $date = '"' . Input::get('year') . '-' . Input::get('month') . '-' . Input::get('day') . '"';
            $content->date = $date;
            $content->body = Input::get('body');
            $content->start = Input::get('start');
            $content->end = Input::get('end');
            $content->highlight = Input::get('highlight');
            $content->save();
        }

        $content = new Content;
        $content->title = Input::get('title');
        $content->body = Input::get('body');
        $content->type = $type;
        $content->save();
    }
}
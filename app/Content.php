<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    public $timestamps = false;


    public function photos() {

        return $this->hasMany('App\Photo');
    }

    public function tags() {

        return $this->belongsToMany('App\Tag','tag_content','content_id','tag_id');
    }

    public function event() {
        return $this->hasOne('App\Event');
    }

    public function research() {
        return $this->hasOne('App\Research');
    }

    public function categories() {

        return $this->belongsToMany('App\Category','category_content','content_id','category_id');
    }

    public function farsiType(){
        $ret = "";
        switch($this->type){
            case "blogs":
                $ret = "بلاگ ها";
            break;
            case "news":
                $ret = "اخبار";
                break;
            case "services":
                $ret ="سرویس ها";
                break;
            case "companies":
                $ret = "شرککت ها";
                break;
            case "galleries":
                $ret ="گالری ها";
                break;
            case "papers":
                $ret ="مقالات";
                break;
            case "didactics":
                $ret = "مطالب آموزشی";
                break;
            case "fields":
                $ret = "حوزه ها";
                break;
            case "events":
                $ret ="رویدادها";
                break;
            case "tools":
                $ret = "ابزارها";
                break;
            case "resources":
                $ret ="منابع";
                break;
            case "researches":
                $ret ="مقالات";
                break;
            case "newsletters":
                $ret ="خبرنامه ها";
                break;
            default:
                $ret ="نوع نامعلوم";
        }
        return $ret;
    }

}
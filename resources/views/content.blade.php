@extends('master')

@section('outsource')
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <!-- Latest compiled JavaScript -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/content.css')}}"/>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/component.css" />
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/modernizr.custom.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/jquery.dlmenu.js"></script>
@endsection

@section('menu')
    @include('nav',["preurl"=>route("home"),"lang"=>$lang])
@endsection

@section('content')
    <section id="content-header" class="page-header onepage-section">
        <img src="{{$vars["logo"]["body"]}}" class="header-logo">
        <h2 class="page-subtitle">@if($lang == "en"){{$content->type}} @else {{$content->farsiType()}} @endif</h2>
        <h1 class="page-title">{{$content->title}}</h1>
        <div class="share-socials">
            <a class="fb" target="_blank" href="http://www.facebook.com/share.php?u=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}&title={{$content->title}}"><span class="fa fa-facebook fa-2x"></span></a>
            <a class="tw" target="_blank" href="http://twitter.com/intent/tweet?status={{$content->title}}+www.ticksoft.sbu.ac.ir/content?id={{$content->title}}"><span class="fa fa-twitter fa-2x"></span></a>
            <a class="gp" target="_blank" href="https://plus.google.com/share?url=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}"><span class="fa fa-google-plus fa-2x"></span></a>
            <a class="ld" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}&title={{$content->title}}&source=www.ticksoft.sbu.ac.ir"><span class="fa fa-linkedin fa-2x"></span></a>
        </div>
    </section>
    <section id="filters" class="filter-section onepage-section empty">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
    </section>
    <section id="content-section" class="onepage-section">
        <div class="content-wrapper {{$content->type}}">
        @if($content->type != "events" && $content->type != "researches")
            <h2>{{$content->title}}</h2>
            <p class="content-date">{{explode(' ',$content->date_created)[0].",".$content->category}}</p>
            @if(!empty($content->photos->first()->path))
            <img src="{{$content->photos->first()->path}}">
            @endif
            <div class="content-body">
                {!! $content->body !!}
            </div>
        @elseif($content->type == "events")
            <h2>{{$content->title}}</h2>
            <img src="{{$content->photos->first()->path}}">
            <table class="event-info">
                <tr>
                    <td class="icon location-icon"><span class="fa fa-map-marker" aria-hidden="true"></span></td>
                    <td class="event-location">{{$content->event->address}}</td>
                    <td class="icon time-icon"><span class="fa fa-clock-o" aria-hidden="true"></span></td>
                    <td class="event-time">{{$content->event->getTime()}}</td>
                </tr>
            </table>
            <div class="event-content">
                {!!$content->body!!}
            </div>
         @elseif($content->type == "researches")
            <h2>{{$content->title}}</h2>
            <div class="paper-info">
                <div class="author"><label>Author(s):</label>{{$content->research->author}}</div>
                <div class="publisher"><label>Published in:</label>{{$content->research->publisher}}</div>
                <div class="publish-date"><label>Date of Publication:</label>{{explode('|',$content->research->date)[0].",".explode('|',$content->research->date)[1].",".explode('|',$content->research->date)[2]}}</div>
                <div class="icons">
                    <a class="paper-icon download" href="{{$content->research->path or "#"}}"><span class="icon fa fa-download"></span></a>
                    <a class="paper-icon link" href="{{$content->research->link or "#"}}"><span class="icon fa fa-link"></span></a>
                </div>
            </div>
            <div class="abstract">
                <label>Abstract</label>
                {{$content->body}}
            </div>
            <div class="keywords"><label>Keywords: </label>{{str_replace("#", ",",$content->research->keywords)}}</div>
         @endif
        </div>
        <div class="back-btn"><a href="contents?type={{$content->type}}" class="back-btn btn btn-default">@if($lang == 'en') Back to {{$content->type}} @else بازگشت به {{$content->farsiType()}} @endif</a></div>
        <div class="share-socials page-bottom">
            <a class="fb" target="_blank" href="http://www.facebook.com/share.php?u=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}&title={{$content->title}}"><span class="fa fa-facebook fa-2x"></span></a>
            <a class="tw" target="_blank" href="http://twitter.com/intent/tweet?status={{$content->title}}+www.ticksoft.sbu.ac.ir/content?id={{$content->title}}"><span class="fa fa-twitter fa-2x"></span></a>
            <a class="blank"></a>
            <a class="gp" target="_blank" href="https://plus.google.com/share?url=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}"><span class="fa fa-google-plus fa-2x"></span></a>
            <a class="ld" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=www.ticksoft.sbu.ac.ir/content?id={{$content->title}}&title={{$content->title}}&source=www.ticksoft.sbu.ac.ir"><span class="fa fa-linkedin fa-2x"></span></a>
        </div>
    </section>
    <section id="related" class="onepage-section">
        <a href="#related" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{($lang == "en") ? "Related Posts" : "مطالب مرتبط"}}</h2>
        <div id="related-wrapper" class="card-wrapper">
            @foreach($related as $rel)
                @include("card",["class"=>"blog","content"=>$rel,"type"=>true])
            @endforeach
        </div>
    </section>
    @include('footer',['top' => 'content-section ',"vars" => $vars])
@endsection
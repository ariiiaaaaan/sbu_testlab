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
    @include('nav',["page"=>"blogs"])
@endsection

@section('content')
    <section id="content-header" class="page-header">
        <img src="images/header-logo-raw.png" class="header-logo">
        <h2 class="page-subtitle">{{$content->type}}</h2>
        <h1 class="page-title">{{$content->title}}</h1>
    </section>
    <section id="filters" class="filter-section">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
    </section>
    <section id="content-section">
        <div class="content-wrapper">

            <h2>{{$content->title}}</h2>
            <p class="content-date">{{explode(' ',$content->date_created)[0]}}</p>
            <img src="{{$content->photos->first()->path}}">
            <div class="content-body">
                {!! $content->body !!}
            </div>
        </div>
    </section>
    <section id="related">
        <a href="content" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Related Posts</h2>
        <div id="blog-wrapper">
            @for($i =0; $i<3; $i++)
                <div class="blog ">
                    <h4>Unit Test</h4>
                    <div class="blog-date"><span class="fa fa-calendar fa-2 2x"></span>July 17th, 2015</div>
                    <div class="blog-body">
                        <p>
                            Educators and parents expressed @if($i%2)satisfaction with the Obama administration's announcement @endif Saturday that it would urge Congress to limit @if($i%3) the amount of time students spend on testing to 2 percent of @endif their total time in school.
                        </p>
                        <img src="images/blog1.jpg">
                    </div>
                    <a href="#" class="blog-btn">CLICK TO VIEW POST</a>
                </div>
            @endfor
        </div>
    </section>
    @include('footer',['top' => 'blogs-section'])
@endsection
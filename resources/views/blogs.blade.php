@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}"/>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            $( '.grid' ).masonry( { itemSelector: '.item', columWidth: $(window).width()*0.8/3 } );
            $('.select').dropdown();

            $('.blog-btn-more').click(function() {
                var id = $(this).attr('offset');
                $.ajax({
                    type: 'GET',
                    url: 'moreblogs',
                    data: {offset: id},
                    cache: false,
                    success: function (returndata) {
                        var $items = $(returndata);
                        $(".grid").append($items);
                        $('.grid').masonry("appended",$items);
                    }
                });
            });
        });
    </script>

@endsection

@section('menu')
    @include('nav',["page"=>"home"])
@endsection

@section('content')
    <section id="blogs-header" class="page-header">
        <img src="images/header-logo-raw.png" class="header-logo">
        <h1 class="page-title">Blogs And News</h1>
        <h2 class="page-subtitle">News and Information About Tools</h2>
    </section>
    <section id="filters" class="filter-section">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <select class="select">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </section>
    <section id="blogs-section">
    <div class="grid">
    @for($i =0; $i<13; $i++)
        <div class="blog item">
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
        <input type="button"  class="blog-btn-more" offset="12" value="CLICK TO VIEW MORE POST">
    </section>
    <section id="global-footer" class="footer-section">
        <a href="#blogs-section" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <div class="pull-left">
            <div class="footer-info"><span class="fa fa-clock-o fa-2x pull-left"></span><p>Office Hours</p><p>Saturday to Thursday 8:00-21:00</p></div>
            <div class="footer-info"><span class="fa fa-phone fa-2x pull-left"></span><p class="solo">+9821-22 90 4196</p></div>
        </div>
        <div class="pull-right">
            <div class="footer-info"><span class="fa fa-map-marker fa-2x pull-left"></span><P>Shahid Beheshti University, Daneshjou Boulevard</P><p>Velenjak, Tehran, Iran</p></div>
            <div class="footer-info"><span class="fa fa-envelope fa-2x pull-left"></span><p class="solo">info@ticksoft.sbu.ac.ir</p></div>
        </div>
        <div class="footer-center">
            <div class="footer-socials">
                <a class="fb" href="#"><span class="fa fa-facebook fa-2x"></span></a>
                <a class="tw" href="#"><span class="fa fa-twitter fa-2x"></span></a>
                <a class="gp" href="#"><span class="fa fa-google-plus fa-2x"></span></a>
                <a class="ld" href="#"><span class="fa fa-linkedin fa-2x"></span></a>
            </div>
            <div class="footer-text">
                <p>Shahid Beheshti University of Tehran<br>Software Testing Laboratory<br>copyright 2015</p>
            </div>
        </div>
    </section>
@endsection
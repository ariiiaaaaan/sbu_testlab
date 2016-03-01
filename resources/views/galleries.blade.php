@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/gallery.css')}}"/>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            var $grid = $('.grid').isotope({
                itemSelector: '.item',
                layoutMode: 'masonry'
            });
            $grid.imagesLoaded().progress( function() {
                $grid.isotope('layout');
            });
            $('.select').dropdown();
            $('.filters-select').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: filterValue
                });
            });
        });
    </script>

@endsection

@section('menu')
    @include('nav',["page"=>"home"])
@endsection

@section('content')
    <section id="gallery-header" class="page-header">
        <img src="images/header-logo-raw.png" class="header-logo">
        <h1 class="page-title">Gallery</h1>
        <h2 class="page-subtitle">Galleries of our events and activities</h2>
    </section>
    <section id="filters" class="filter-section">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <select class="filters-select select">
            <option value="*">show all</option>
            <option value=".exhibition">exhibition</option>
            <option value=".conference">conference</option>
        </select>
    </section>
    <section id="galleries-section">
        <div class="grid">
            @for($i =0; $i<13; $i++)
                <div class="gallery item @if($i%2) {{"exhibition"}} @else {{"conference"}} @endif">
                    <h4>Web Conferance</h4>
                    <div class="gallery-body">
                        <p>
                            Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit @if($i%3) the amount of time students spend on testing to 2 percent of @endif their total time in school.
                        </p>
                        @if($i%2)
                        <img src="images/gallery1.jpg">
                            @else
                            <img src="images/gallery2.jpg">
                            @endif
                    </div>
                    <a href="#" class="gallery-btn">CLICK TO VIEW GALLERY</a>
                </div>
            @endfor
        </div>
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
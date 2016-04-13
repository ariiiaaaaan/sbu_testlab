@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/gallery.css')}}"/>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/packery.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            var $grid = $('.grid').packery({
                itemSelector: '.item',
                gutter: 0
            });
            $grid.imagesLoaded().progress( function() {
                $grid.packery();
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
//            $("#image-modal").modal();
            $(".grid").on('click','.img.item',function(e){
                $("#image-modal #the-image").attr("src",$(this).find("img").attr("src"));
                $("#image-modal").modal("show");
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
        <h2 class="page-subtitle">Test gallery no. 1</h2>
    </section>
    <section id="gallery-body" class="body-section">
        <a href="#gallery-body" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <p>This is the decription for the test gallery.<br>It's not making any sense!</p>
    </section>
    <section id="gallery-section">
        <div class="grid">
            @for($i =0; $i<13; $i++)
                <div class="img item @if(!($i%4)) {{"highlight"}} @endif">
                    <div class="img-body">
                        <h4>
                            @if($i%2) Image one title @else The other image title  @endif
                        </h4>
                        <p>
                            <span class="fa fa-search-plus fa-2x"></span>
                        </p>
                        @if($i%2)
                            <img src="images/gallery1.jpg">
                        @else
                            <img src="images/gallery2.jpg">
                        @endif
                    </div>

                </div>
            @endfor
        </div>
    </section>
    <section id="global-footer" class="footer-section">
        <a href="#gallery-body" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
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

    <div class="modal-dialog">
        <div id="image-modal" class="modal fade" role="dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Image description</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                            <img id="the-image"  src="">

                </div>
            </div>

        </div>
    </div>
@endsection
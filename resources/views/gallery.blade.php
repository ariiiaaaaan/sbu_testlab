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
                $("#image-modal #the-image").attr("src",$(this).find("img").attr("original"));
                $("#image-modal #modal-title").text($(this).find("h4").text());
                $("#image-modal").modal("show");
            });
        });
    </script>

@endsection

@section('menu')
    @include('nav',["preurl"=>route("home"),"lang"=>$lang])
@endsection

@section('content')
    <section id="gallery-header" class="page-header">
        <img src="{{$vars["logo"]["body"]}}" class="header-logo">
        @if($lang == "en")
            <h1 class="page-title">Gallery</h1>
        @else
            <h1 class="page-title">گالری</h1>
        @endif
        <h2 class="page-subtitle">{{$gallery->title}}</h2>
        <div class="share-socials">
            <a class="fb" target="_blank" href="http://www.facebook.com/share.php?u=www.ticksoft.sbu.ac.ir/gallery?id={{$gallery->title}}&title={{$gallery->title}}"><span class="fa fa-facebook fa-2x"></span></a>
            <a class="tw" target="_blank" href="http://twitter.com/intent/tweet?status={{$gallery->title}}+www.ticksoft.sbu.ac.ir/gallery?id={{$gallery->title}}"><span class="fa fa-twitter fa-2x"></span></a>
            <a class="gp" target="_blank" href="https://plus.google.com/share?url=www.ticksoft.sbu.ac.ir/gallery?id={{$gallery->title}}"><span class="fa fa-google-plus fa-2x"></span></a>
            <a class="ld" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=www.ticksoft.sbu.ac.ir/gallery?id={{$gallery->title}}&title={{$gallery->title}}&source=www.ticksoft.sbu.ac.ir"><span class="fa fa-linkedin fa-2x"></span></a>
        </div>
    </section>
    <section id="gallery-body" class="body-section">
        <a href="#gallery-body" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <div>
            {!!$gallery->body!!}
        </div>
    </section>
    <section id="gallery-section">
        <div class="grid">
            @foreach($gallery->photos as $photo )
                <div class="img item @if($photo->highlight == true){{"highlight"}} @endif">
                    <div class="img-body">
                        <h4>
                            {{$photo->title}}
                        </h4>
                        <p>
                            <span class="fa fa-search-plus fa-2x"></span>
                        </p>
                        <img src="thumbnails/{{$photo->path}}" original="{{$photo->path}}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal-dialog">
            <div id="image-modal" class="modal fade" role="dialog">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" id="modal-title"></h3>
                    </div>
                    <div class="modal-body">

                        <img id="the-image"  src="">

                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('footer',['top' => 'gallery-body',"vars" => $vars])


@endsection
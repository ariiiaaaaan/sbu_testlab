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
    @include('nav',["preurl"=>route("home"),"lang"=>$lang])
@endsection

@section('content')
    <section id="gallery-header" class="page-header">
        <img src="{{$vars["logo"]["body"]}}" class="header-logo">
        <h1 class="page-title">{{$vars["galleries"]["title"]}}</h1>
        <h2 class="page-subtitle">{{$vars["galleries"]["subtitle"]}}</h2>
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
            @foreach($galleries as $gal)
                <div class="gallery item {{$gal->category or "all"}} ">
                    <a href="gallery?id={{$gal->id}}">
                        <h4>{!! str_limit($gal->title,30) !!}</h4>
                        <div class="gallery-body">
                            <div class="p">
                                {!!str_limit($gal->body,250)!!}
                            </div>
                            <img src="{{$gal->photos->first()->path or "non"}}">
                        </div>
                        @if($lang == "en")
                            <a href="gallery?id={{$gal->id}}" class="gallery-btn">CLICK TO VIEW GALLERY</a>
                        @else
                            <a href="gallery?id={{$gal->id}}" class="gallery-btn">مشاهده‌ی گالری</a>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    @include('footer',['top' => 'blogs-section',"vars" => $vars])
@endsection
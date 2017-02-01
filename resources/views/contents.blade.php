@extends('master')

@section('outsource')
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <!-- Latest compiled JavaScript -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/content.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/component.css" />
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/modernizr.custom.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/jquery.dlmenu.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            $('#cat-container').dlmenu({
                animationClasses: {classin: 'dl-animate-in-1', classout: 'dl-animate-out-1'}
            });

//            var $tree;
//            $.ajax({
//                type: 'GET',
//                url: 'categoryjson',
//                data: {},
//                cache: false,
//                success: function (returndata) {
//                    $tree = $(returndata);
//                },
//                error: function(jqXHR, textStatus, errorThrown)
//                {
//                    alert("Failed to load categories"); //if fails
//                }
//            });
//
//            var FullFilter = function (cat){
//                for(var ch in cat.children)
//
//            }


            var $grid = $('.grid').isotope({
                itemSelector: '.item',
                layoutMode: 'masonry'
            });

            $grid.isotope('layout');

            $('#selected-cat').on('change', function() {
                // get filter value from option value
                //alert(this.value);
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: "."+filterValue
                });
            });

            $('.card-btn-more').click(function() {
                var page = $(this).attr('page');
                $.ajax({
                    type: 'GET',
                    url: 'morecontents',
                    data: {page: page,type : "{{$type}}" },
                    cache: false,
                    success: function (returndata) {
                        var $items = $(returndata);
                        $(".grid").append($items);
                        $grid.isotope("appended",$items);
                        $('.card-btn-more').attr('page', (parseInt(page,10)+1).toString());
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        alert("hi"); //if fails
                    }
                });
            });

        });
    </script>

@endsection

@section('menu')
    @include('nav',["preurl"=>route("home"),"lang"=>$lang])
@endsection

@section('content')
    <section id="blogs-header" class="page-header">
        <img src="{{$vars["logo"]["body"]}}" class="header-logo">
        <h1 class="page-title">{{$vars[$type]["title"]}}</h1>
        <h2 class="page-subtitle">{{$vars[$type]["subtitle"]}}</h2>
    </section>
    <section id="filters" class="filter-section">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        @include('categorysimple',['nodes'=>$cats,'level'=>0,"lang"=>$lang])
    </section>
    <section id="blogs-section">
        <div class="grid">
            @foreach($contents as $content)
                @include("cardflex",["class"=>"item","content"=>$content, "lang" => $lang])
            @endforeach
        </div>
        @if($lang == "en")
            <input type="button"  class="card-btn-more" page="1" value="CLICK TO VIEW MORE POST">
        @else
            <input type="button"  class="card-btn-more" page="1" value="مشاهده‌ی پست‌های بیشتر ">
        @endif
    </section>
    @include('footer',['top' => 'blogs-section',"vars" => $vars])
@endsection
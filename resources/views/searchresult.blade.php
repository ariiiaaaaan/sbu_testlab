@extends("master")

@section("outsource")
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
{{--    <link rel="stylesheet" type="text/css" href="{{asset('css/gallery.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}"/>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/cells-by-row.js"></script>
    {{--<script src="https://unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>--}}
    <script type="text/javascript">

        $( window ).load( function()
        {
            var vh =  ($(window).height())/100;
            var vw =  ($(window).width())/100;
            var $grid = $('.grid').isotope({
                layoutMode: 'cellsByRow',
                itemSelector: '.item',
                cellsByRow: {
                    columnWidth: 70*vw,
                    rowHeight: 70*vh
                }
            });



            $grid.isotope('layout');

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

@section("content")
    <section id="search-header" class="page-header">
        <span class="fa fa-search fa-4x header-logo"></span>
        <h1 class="page-title">{{$lang == "en" ? 'Search result for' : 'نتایج جستجو برای'}}</h1>
        <h2 class="page-subtitle">{{$query}}</h2>
    </section>
    <section id="filters" class="filter-section">
        <a href="#filters" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <select class="filters-select select">
            <option value="*">{{$lang == "en" ? "Show All" : "همه ی نتایج"}}</option>
            @foreach($types as $key => $type)
                <option value="{{".".$key}}">{{$lang == "en" ? $key : $type}}</option>
            @endforeach
        </select>
    </section>
    <section id="results-section">
        <div class="grid">
            @foreach($result as $res)
                <div class="result item {{$res->type}}">
                        <h4>{{$res->title}}</h4>
                        <h5>{{$lang=="en" ? $res->type:$res->farsiType()}}</h5>
                        <div class="p">{!!$res->body!!}</div>
                    @if($lang == "en")
                        <a href="content?id={{$res->id}}" class="result-btn">CLICK TO VIEW POST</a>
                    @else
                        <a href="content?id={{$res->id}}" class="result-btn">مشاهده‌ی مطلب</a>
                    @endif
                </div>
            @endforeach
            @if(count($result) == 0)
                @if($lang == 'en')
                    <p style="text-align: center">No Result</p>
                @else
                    <p style="text-align: center">نتیجه ای یافت نشد</p>
                @endif
            @endif
        </div>
    </section>
    @include('footer',['top' => 'results-section',"vars" => $vars])
@endsection
@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            alert($(window).width()*0.8/3);
            $( '.grid' ).masonry( { itemSelector: '.item', columWidth: $(window).width()*0.8/3 } );
        });
    </script>
@endsection

@section('menu')
    @include('nav',["page"=>"home"])
@endsection

@section('content')
    <section id="blogs-header" class="page-header">
        <img src="images/header-logo.png" class="header-logo">
        <p class="logo-caption">Blogs And News</p>
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
    </section>
@endsection
@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/masonry-horizontal.js"></script>
    <script>
        $( window ).load( function() {
            $('#event-wrapper').isotope({
                layoutMode: 'masonryHorizontal',
                itemSelector: '.event',
                masonryHorizontal: {
                    rowHeight: $(window).height()*0.60/2
                }});
            $('.event').mouseover(function(){
                $('.event').addClass("fade");
                $(this).removeClass("fade");
            });
            $('.event').mouseleave(function(){
                $('.event').removeClass("fade");
            });

        });
    </script>
@endsection

@section('menu')
    @include('nav',["page"=>"home"])
@endsection

@section('content')
    <section id="home" class="onepage-section">
        <img src="images/header-logo-prev.png" class="header-logo">
        <p class="logo-caption">Shahid Beheshti University Of Tehran Laboratories</p>
    </section>
    <section id="Introduction" class="onepage-section">
        <a href="#Introduvtion" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Introduction</h2>
        <h3>Who we are and what we can do</h3>
        <div class="section-text">
            <div class="auto-scroll-wrapper">
                <div class="auto-scroll">
                    Why? Because such a move would undoubtedly hit the aforementioned upsell factor. Apple may try and counter this by making 128GB and 256GB the new mid and top level storage options, but I can still see 32GB proving to be ‘enough’ for many mainstream users. Similarly the knock-on effect of a 128GB midranger would likely make the top end 256GB edition wholly unnecessary for most people.

                    As such the move to 32GB would be a risk. But does Apple have a choice?

                    Personally I’d argue it is no longer credible in 2016 to sell a smartphone with 16GB of storage for $650 and after Apple’s sales hit with the iPhone 6S it may be forced to move with the times.
                    Obviously the latter is the real talking point given the iPhone range has been marooned on 16GB since the iPhone 5 was introduced back in 2012. This is criminal given rivals moved to 32GB years ago and Apple has since introduced a 50% larger camera sensor plus storage hogging Live Photos and 4K video recording to its phones.
                    Why? Because such a move would undoubtedly hit the aforementioned upsell factor. Apple may try and counter this by making 128GB and 256GB the new mid and top level storage options, but I can still see 32GB proving to be ‘enough’ for many mainstream users. Similarly the knock-on effect of a 128GB midranger would likely make the top end 256GB edition wholly unnecessary for most people.

                    As such the move to 32GB would be a risk. But does Apple have a choice?

                    Personally I’d argue it is no longer credible in 2016 to sell a smartphone with 16GB of storage for $650 and after Apple’s sales hit with the iPhone 6S it may be forced to move with the times.
                    Obviously the latter is the real talking point given the iPhone range has been marooned on 16GB since the iPhone 5 was introduced back in 2012. This is criminal given rivals moved to 32GB years ago and Apple has since introduced a 50% larger camera sensor plus storage hogging Live Photos and 4K video recording to its phones.
                </div>
            </div>
        </div>
        <a href="blogs" class="blog-btn-all">CLICK TO SEE ABOUT PAGE</a>
    </section>
    <section id="industry" class="onepage-section tab-section">
        <a href="#industry" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Test In Industry</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#industrytab1">Services</a></li>
                <li><a data-toggle="pill" href="#industrytab2">Field</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="industrytab1" class="tab-pane fade in active">
                    <div class="hider">
                        <div id="service-wrapper">
                            @for($i =0; $i<9; $i++)
                                <div class="service">
                                    <img src="images/service1.png">
                                    <h4>Game Testing</h4>
                                    <p>
                                        Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.
                                    </p>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <span class="fa fa-angle-right fa-4x" id="services-next"></span>
                    <span class="fa fa-angle-left fa-4x" id="services-prev"></span>
                </div>
                <div id="industrytab2" class="tab-pane fade"">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>
        </div>
        </div>
    </section>
    <section id="services" class="onepage-section">
        <a href="#services" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Services We Provide</h2>
        <h3>We are working on software testing and repair</h3>
        <div class="hider">
            <div id="service-wrapper">
                @for($i =0; $i<9; $i++)
                <div class="service">
                    <img src="images/service1.png">
                    <h4>Game Testing</h4>
                    <p>
                        Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.
                    </p>
                </div>
                @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="services-next"></span>
        <span class="fa fa-angle-left fa-4x" id="services-prev"></span>
    </section>
    <section id="blogs" class="onepage-section">
        <a href="#blogs" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Blog and News</h2>
        <h3>News and information about tools</h3>
        <div id="blog-wrapper">
            @for($i =0; $i<3; $i++)
                <div class="blog">
                    <h4>Unit Test</h4>
                    <div class="blog-date"><span class="fa fa-calendar fa-2 2x"></span>July 17th, 2015</div>
                    <p>
                        Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.
                    </p>
                    <img src="images/blog1.jpg">
                    <a href="blogs" class="blog-btn">CLICK TO VIEW POST</a>
                </div>
            @endfor
        </div>
        <a href="blogs" class="blog-btn-all">CLICK TO VIEW MORE POST</a>
    </section>
    <section id="events" class="onepage-section">
        <a href="#events" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Events</h2>
        <h3>Seminars and Presentations we want to provide</h3>
        <div class="hider">
            <div id="event-wrapper">
                @for($i = 0; $i<18; $i++)
                <div class="event @if(mt_rand()%10 < 4 ) highlight @endif color{{mt_rand()%6 + 1}}">
                <div class="overlay">
                <p class="day">25</p>
                <p class="month">July</p>
                </div>
                <div class="content">
                <h3 class="title">The London Test Automation</h3>
                <p class="location">Shahid Beheshti University</p>
                <p class="time">15:00 - 18:30</p>
                <p class="desc">Some description about the event which should be trim and prepared for the homepage ...</p>
                </div>
                </div>
                @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="events-next"></span>
        <span class="fa fa-angle-left fa-4x" id="events-prev"></span>
    </section>
    <section id="researches" class="onepage-section">
        <a href="#researches" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Researches and Papers </h2>
        <h3>Our Researches and Papers</h3>
        <div class="research">
            <h4>Co-Evolutionary automatic prograing for software development</h4>
            <h5>Andrea Arcuri,xin Yao</h5>
            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
        </div>
        <div class="research">
            <h4>Co-Evolutionary automatic prograing for software development</h4>
            <h5>Andrea Arcuri,xin Yao</h5>
            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
        </div>
        <a href="#" class="research-btn-all">CLICK TO VIEW MORE POST</a>
    </section>
    <section id="companies" class="onepage-section">
        <a href="#companies" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Our Partners</h2>
        <h3>Companies we have worked with or for them</h3>
        <div class="hider">
            <div id="company-wrapper">
                @for($i =0; $i<9; $i++)
                    <div class="company">
                        <img src="images/company.png">
                        <h4>Hewlett Packard</h4>
                        <p>
                            Educators and parents expressed satisfaction with the Obama administration's.
                        </p>
                    </div>
                @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="company-next"></span>
        <span class="fa fa-angle-left fa-4x" id="company-prev"></span>
    </section>
    <section id="gallery" class="onepage-section">
        <a href="#gallery" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Gallery </h2>
        <h3>Galleries of events and etc</h3>
        <div id="gallery-wrapper">
            @for($i =0; $i<3; $i++)
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
        <a href="galleries" class="research-btn-all">CLICK TO VIEW MORE POSTS</a>
    </section>
    <section id="contact" class="onepage-section">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Contact Us</h2>
        <h3>The means to contact us</h3>
        <div class="form-wrapper pull-right">
            <form id="contact-form">
                <input type="text" class="name" placeholder="Name">
                <input type="email" class="email" placeholder="Email">
                <textarea class="body" placeholder="Message"></textarea>
                <input type="submit" class="send" value="SEND">
            </form>
        </div>
        <div class="links-wrapper pull-left">
            <div class="info">
                <div class="footer-info"><span class="fa fa-clock-o fa-2x pull-left"></span><p>Office Hours</p><p>Saturday to Thursday 8:00-21:00</p></div>
                <div class="footer-info"><span class="fa fa-phone fa-2x pull-left"></span><p class="solo">+9821-22 90 4196</p></div>
                <div class="footer-info"><span class="fa fa-map-marker fa-2x pull-left"></span><P>Shahid Beheshti University, Daneshjou Boulevard</P><p>Velenjak, Tehran, Iran</p></div>
                <div class="footer-info"><span class="fa fa-envelope fa-2x pull-left"></span><p class="solo">info@ticksoft.sbu.ac.ir</p></div>
            </div>
            <div class="socials">
                <a class="fb" href="#"><span class="fa fa-facebook fa-2x"></span></a>
                <a class="tw" href="#"><span class="fa fa-twitter fa-2x"></span></a>
                <a class="gp" href="#"><span class="fa fa-google-plus fa-2x"></span></a>
                <a class="ld" href="#"><span class="fa fa-linkedin fa-2x"></span></a>
            </div>
        </div>
    </section>
    <section id="footer" class="onepage-section">
        <a href="#home" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <h1>Shahid Beheshti University of Tehran<br>Software Testing Laboratories</h1>
        <h3>copyright 2015</h3>
    </section>

@endsection
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
                    rowHeight: $(window).height()*0.55/2
                }});
        });
    </script>
@endsection

@section('menu')
    @include('nav',["page"=>"home"])
@endsection

@section('content')
    <section id="home" class="home-section">
        <img src="images/header-logo-prev.png" class="header-logo">
        <p class="logo-caption">Shahid Beheshti University Of Tehran Laboratories</p>
    </section>
    <section id="services" class="home-section">
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
    <section id="blogs" class="home-section">
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
                    <a href="#" class="blog-btn">CLICK TO VIEW POST</a>
                </div>
            @endfor
        </div>
        <a href="#" class="blog-btn-all">CLICK TO VIEW MORE POST</a>
    </section>
    <section id="events" class="home-section">
        <a href="#events" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Events</h2>
        <h3>Seminars and Presentations we want to provide</h3>
        <div class="hider">
            <div id="event-wrapper">
                    <div class="event">
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
                    <div class="event highlight">
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
                    <div class="event">
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
                    <div class="event">
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
                <div class="event">
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
                <div class="event">
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
                <div class="event highlight">
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
                <div class="event">
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
                <div class="event">
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
                <div class="event highlight">
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
                <div class="event">
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
                <div class="event">
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
                <div class="event">
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
                <div class="event highlight">
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
                <div class="event">
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
                <div class="event">
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
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="events-next"></span>
        <span class="fa fa-angle-left fa-4x" id="events-prev"></span>
    </section>
    <section id="researches" class="home-section">
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
    <section id="companies" class="home-section">
        <a href="#companies" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Researches and Papers </h2>
        <h3>Our Researches and Papers</h3>
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
    <section id="gallery" class="home-section">
        <a href="#gallery" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Gallery </h2>
        <h3>Galleries of events and etc</h3>
        <a href="#" class="research-btn-all">CLICK TO VIEW MORE POSTS</a>
        <div id="gallery-wrapper">
            <div class="gallery">
                <div class="overlay">
                    <p class="title">25</p>
                </div>
                <img class="cover" src="gallerysample.jpg">
            </div>
        </div>
    </section>
    <section id="contact" class="home-section">
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
    <section id="footer" class="home-section">
        <a href="#home" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <h1>Shahid Beheshti University of Tehran<br>Software Testing Laboratories</h1>
        <h3>copyright 2015</h3>
    </section>

@endsection
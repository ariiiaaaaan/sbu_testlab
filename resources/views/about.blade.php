
@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/masonry-horizontal.js"></script>
@endsection

@section('menu')
    <li class=""><a href="home">Website Home</a></li>
    <li class=""><a href="#goals">Goals</a></li>
    <li class=""><a href="#industry">Industry</a></li>
    <li class=""><a href="#research">Research</a></li>
    <li class=""><a href="#tools">Tools</a></li>
    <li class=""><a href="#members">Members</a></li>
@endsection

@section('content')
    <section id="home" class="onepage-section">
        <img src="images/header-logo-prev.png" class="header-logo">
        <p class="logo-caption">Shahid Beheshti University Of Tehran Laboratories</p>
    </section>
    <section id="goals" class="onepage-section">
        <a href="#goals" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Our Goals</h2>
        <h3>We are working on software testing and repair</h3>

    </section>
    <section id="industry" class="onepage-section tab-section">
        <a href="#industry" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Test In Industry</h2>
            <div class="col-sm-12 section-nav-container">
                <ul class="nav nav-pills text-center">
                    <li class="active"><a data-toggle="pill" href="#tab1">Services</a></li>
                    <li><a data-toggle="pill" href="#tab2">Field</a></li>
                </ul>
            </div>
            <div class="col-sm-12 section-tab-container">
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
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
                    <div id="tab2" class="tab-pane fade"">
                        <h3>Menu 1</h3>
                        <p>Some content in menu 1.</p>
                    </div>
                </div>
            </div>
    </section>
    <section id="research" class="onepage-section">
        <a href="#research" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Research</h2>
        <h3>Seminars and Presentations we want to provide</h3>
    </section>
    <section id="tools" class="onepage-section">
        <a href="#tools" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Researches and Papers </h2>
        <h3>Our Researches and Papers</h3>

    </section>
    <section id="members" class="onepage-section">
        <a href="#members" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Our Partners</h2>
        <h3>Companies we have worked with or for them</h3>
        <div class="hider">
            <div id="members-wrapper">
                @for($i =0; $i<9; $i++)
                    <div class="member">
                        <img src="upload/larry-page.jpg">
                        <h4>Hewlett Packard</h4>
                    </div>
                @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="members-next"></span>
        <span class="fa fa-angle-left fa-4x" id="members-prev"></span>
    </section>
    <section id="gallery" class="onepage-section">
        <a href="#gallery" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Gallery </h2>
        <h3>Galleries of events and etc</h3>

    </section>

    <section id="footer" class="onepage-section">
        <a href="#home" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <h1>Shahid Beheshti University of Tehran<br>Software Testing Laboratories</h1>
        <h3>copyright 2015</h3>
    </section>

@endsection

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/masonry-horizontal.js"></script>

@endsection

@section('menu')
    <li class=""><a href="home">Website Home</a></li>
    <li class=""><a href="#goals">Goals</a></li>
    <li class=""><a href="#industry">Industry</a></li>
    <li class=""><a href="#research">Research</a></li>
    <li class=""><a href="#tools">Tools</a></li>
    <li class=""><a href="#members">Members</a></li>
@endsection

@section('content')
    <section id="home" class="onepage-section">
        <img src="images/header-logo-prev.png" class="header-logo">
        <p class="logo-caption">Shahid Beheshti University Of Tehran Laboratories</p>
    </section>
    <section id="goals" class="onepage-section">
        <a href="#goals" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Services We Provide</h2>
        <h3>We are working on software testing and repair</h3>

    </section>
    <section id="industry" class="onepage-section tab-section">
        <a href="#industry" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Services We Provide</h2>
            <div class="col-sm-12 section-nav-container">
                <ul class="nav nav-pills text-center">
                    <li class="active"><a data-toggle="pill" href="#tab1">Services</a></li>
                    <li><a data-toggle="pill" href="#tab2">Field</a></li>
                </ul>
            </div>
            <div class="col-sm-12 section-tab-container">
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
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
                    <div id="tab2" class="tab-pane fade"">
                        <h3>Menu 1</h3>
                        <p>Some content in menu 1.</p>
                    </div>
                </div>
            </div>
    </section>
    <section id="research" class="onepage-section">
        <a href="#research" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Events</h2>
        <h3>Seminars and Presentations we want to provide</h3>
    </section>
    <section id="tools" class="onepage-section">
        <a href="#tools" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Researches and Papers </h2>
        <h3>Our Researches and Papers</h3>

    </section>
    <section id="members" class="onepage-section">
        <a href="#members" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Our Partners</h2>
        <h3>Companies we have worked with or for them</h3>
        <div class="hider">
            <div id="members-wrapper">
                @for($i =0; $i<9; $i++)
                    <div class="member">
                        <img src="upload/larry-page.jpg">
                        <h4>Hewlett Packard</h4>
                    </div>
                @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="members-next"></span>
        <span class="fa fa-angle-left fa-4x" id="members-prev"></span>
    </section>
    <section id="gallery" class="onepage-section">
        <a href="#gallery" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>Gallery </h2>
        <h3>Galleries of events and etc</h3>

    </section>

    <section id="footer" class="onepage-section">
        <a href="#home" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <h1>Shahid Beheshti University of Tehran<br>Software Testing Laboratories</h1>
        <h3>copyright 2015</h3>
    </section>

@endsection
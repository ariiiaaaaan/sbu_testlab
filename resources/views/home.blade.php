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
                    rowHeight: $(window).height()*0.56/2
                }});
            $('.event').mouseover(function(){
                $('.event').addClass("fade");
                $(this).removeClass("fade");
            });
            $('.event').mouseleave(function(){
                $('.event').removeClass("fade");
            });

            $(".service,.field").click(function(){
                $('#service-modal').modal();
                $('#service-modal .modal-body').html($(this).html());
                $('#service-modal').modal("show");
            });

        });
    </script>
@endsection

@section('menu')
    @include('nav',["page"=>"home","lang"=>$lang])
@endsection

@section('content')
    <section id="home" class="onepage-section">
        <img src="{{$var["logo"]["body"]}}" class="header-logo">
        <p class="logo-caption">{{$var["logo"]["title"]}}</p>
    </section>
    <section id="introduction" class="onepage-section">
        <a href="#introduction" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["introduction"]["title"]}}</h2>
        <h3>{{$var["introduction"]["subtitle"]}}</h3>
        <div class="section-text">
            {{--<div class="auto-scroll-wrapper">--}}
                {{--<div class="auto-scroll">--}}
            <div class="custom-scroll-wrapper">
                <div class="custom-scroll-content">
                    {!!$var["introduction"]["body"]!!}
                </div>
                {{--<a class="animate-modal-btn"></a>--}}
            </div>
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <a href="about" class="section-btn-all">مشاهده‌ی صفحه‌ی معرفی</a>
    </section>
    <section id="industry" class="onepage-section tab-section">
        <a href="#industry" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["industry"]["title"]}}</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#industry-tab1">{{$var["industry"]["subtitle"]}}</a></li>
                <li><a data-toggle="pill" href="#industry-tab2">{{$var["industry"]["body"]}}</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="industry-tab1" class="tab-pane fade in active">
                    <div class="hider">
                        <div id="service-wrapper">
                            @foreach($content["services"] as $service)
                                <div class="service">
                                    <img src="{{$service->photos->path or "images/service1.png"}}">
                                    <h4>{{$service->title}}</h4>
                                    <p>
                                        {!!$service->body!!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <span class="fa fa-angle-right fa-4x" id="services-next"></span>
                    <span class="fa fa-angle-left fa-4x" id="services-prev"></span>
                </div>
                <div id="industry-tab2" class="tab-pane fade">
                    <div class="hider">
                        <div id="field-wrapper">
                            @foreach($content["fields"] as $field)
                                <div class="field">
                                    <img src="{{$field->photos->path or "images/service1.png"}}">
                                    <h4>{{$field->title}}</h4>
                                    <p>
                                        {!!$field->body!!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <span class="fa fa-angle-right fa-4x" id="fields-next"></span>
                    <span class="fa fa-angle-left fa-4x" id="fields-prev"></span>
                </div>
            </div>
        </div>

    </section>
    <section id="events" class="onepage-section">
        <a href="#events" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["events"]["title"]}}</h2>
        <h3>{{$var["events"]["subtitle"]}}</h3>
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
    <section id="blogs" class="onepage-section">
        <a href="#blogs" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["blogs"]["title"]}}</h2>
        <h3>{{$var["blogs"]["subtitle"]}}</h3>
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
        <a href="blogs" class="section-btn-all">CLICK TO VIEW MORE POST</a>
    </section>
    <section id="members" class="onepage-section">
        <a href="#members" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["members"]["title"]}}</h2>
        <h3>{{$var["members"]["subtitle"]}}</h3>
        <div class="hider">
            <div id="member-wrapper">
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
    <section id="didactics" class="onepage-section">
        <a href="#didactics" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["didactics"]["title"]}}</h2>
        <h3>{{$var["didactics"]["subtitle"]}}</h3>
        <div id="blog-wrapper">
            @for($i =0; $i<3; $i++)
                <div class="blog">
                    <div class="auto-scroll-wrapper">
                        <div class="auto-scroll">
                            Unit Test hjsdfsdfh jdfdsfb kjdbfskdbf kjbdfksdjbfds kjdsfdskjfb
                        </div>
                    </div>
                    <div class="blog-date"><span class="fa fa-calendar fa-2 2x"></span>July 17th, 2015</div>
                    <p>
                        Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.
                    </p>
                    <img src="images/blog1.jpg">
                    <a href="blogs" class="blog-btn">CLICK TO VIEW POST</a>
                </div>
            @endfor
        </div>
        <a href="blogs" class="section-btn-all">CLICK TO VIEW MORE POST</a>
    </section>
    <section id="resources" class="onepage-section tab-section">
        <a href="#resources" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["resources"]["title"]}}</h2>
        <h3>{{$var["resources"]["subtitle"]}}</h3>
        <div class="link-tab">
        <div class="custom-scroll-wrapper link-wrapper">
            <div class="custom-scroll-content">

                @for($i = 0; $i<18; $i++)
                    <a href="#" class="link-item">some industrial field</a>
                @endfor
            </div>
            {{--<a class="animate-modal-btn"></a>--}}
        </div>
        </div>
    </section>
    <section id="resources" class="onepage-section tab-section">
        <a href="#resources" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$lang == "en" ? "Papers":"مقالات" }}</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#resource-tab1">{{$lang == "en" ? "Our papers" : "مقالات ما"}}</a></li>
                <li><a data-toggle="pill" href="#resource-tab2">{{$lang == "en" ? "others' papers" : "مقالات دیگران"}}</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="resource-tab1" class="tab-pane fade in active">

                        <div class="research">
                            <h4>Co-Evolutionary automatic prograing for software development</h4>
                            <h5>Andrea Arcuri,xin Yao</h5>
                            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
                            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
                        </div>
                        <div class="research">
                            <h4>Co-Evolutionary automatic prograing for software development</h4>
                            <h5>Andrea Arcuri,xin Yao</h5>
                            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
                            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
                        </div>

                    <a href="contents?type=paper" class="section-btn-all">CLICK TO VIEW MORE POSTS</a>
                </div>
                <div id="resource-tab2" class="tab-pane fade">
                        <div class="research">
                            <h4>Co-Evolutionary automatic prograing for software development</h4>
                            <h5>Andrea Arcuri,xin Yao</h5>
                            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
                            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
                        </div>
                        <div class="research">
                            <h4>Co-Evolutionary automatic prograing for software development</h4>
                            <h5>Andrea Arcuri,xin Yao</h5>
                            <p>Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.Educators and parents expressed satisfaction with the Obama administration's announcement Saturday that it would urge Congress to limit the amount of time students spend on testing to 2 percent of their total time in school.</p>
                            <a href="#" class="research-btn">CLICK TO VIEW POST</a>
                        </div>

                        <a href="contents?type=paper" class="section-btn-all">CLICK TO VIEW MORE POSTS</a>
                </div>
            </div>
        </div>

    </section>
    <section id="companies" class="onepage-section">
        <a href="#companies" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["companies"]["title"]}}</h2>
        <h3>{{$var["companies"]["subtitle"]}}</h3>
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
        <h2>{{$var["galleries"]["title"]}}</h2>
        <h3>{{$var["galleries"]["subtitle"]}}</h3>
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
        <a href="galleries" class="section-btn-all">CLICK TO VIEW MORE POSTS</a>
    </section>
    <section id="contact" class="onepage-section">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["contact"]["title"]}}</h2>
        <h3>{{$var["contact"]["subtitle"]}}</h3>
        <div class="form-wrapper pull-right">
            <form id="contact-form">
                <input type="text" class="name" placeholder="Name">
                <input type="email" class="email" placeholder="Email">
                <textarea class="body" placeholder="Message"></textarea>
                <input type="submit" class="send pull-left" value="SEND">
            </form>
        </div>
        <div class="links-wrapper pull-left">
            <div class="info">
                <div class="footer-info"><span class="fa fa-clock-o fa-2x pull-left"></span><p>Office Hours</p><p>{{$var["office-hours"]["title"]}}</p></div>
                <div class="footer-info"><span class="fa fa-phone fa-2x pull-left"></span><p class="solo">{{$var["tell"]["title"]}}</p></div>
                <div class="footer-info"><span class="fa fa-map-marker fa-2x pull-left"></span><P>{{$var["address"]["title"]}}</P><p>{{$var["address"]["subtitle"]}}</p></div>
                <div class="footer-info"><span class="fa fa-envelope fa-2x pull-left"></span><p class="solo">{{$var["email"]["title"]}}</p></div>
            </div>
            <div class="socials">
                <a class="fb" href="{{$var["facebook"]["title"]}}"><span class="fa fa-facebook fa-2x"></span></a>
                <a class="tw" href="{{$var["twitter"]["title"]}}"><span class="fa fa-twitter fa-2x"></span></a>
                <a class="gp" href="{{$var["googleplus"]["title"]}}"><span class="fa fa-google-plus fa-2x"></span></a>
                <a class="ld" href="{{$var["linkedin"]["title"]}}"><span class="fa fa-linkedin fa-2x"></span></a>
            </div>
        </div>
    </section>
    <section id="footer" class="onepage-section">
        <a href="#home" class="section-down-btn"><span class="fa fa-angle-up fa-4x"></span></a>
        <h2>{{$var["footer"]["title"]}}<br>{{$var["footer"]["subtitle"]}}</h2>
        <h3>{{$var["footer"]["body"]}}</h3>
    </section>
    <div id="service-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
            </div>

        </div>
    </div>

@endsection

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
    <li class=""><a href="#experience">Experience</a></li>
    <li class=""><a href="#research">Research</a></li>
    <li class=""><a href="#papers">Papers</a></li>
    <li class=""><a href="#tools">Tools</a></li>
    <li class=""><a href="#members">Members</a></li>
@endsection

@section('content')
    <section id="home" class="onepage-section">
        <img src="{{$var["logo"]["body"]}}" class="header-logo">
        <p class="logo-caption">{{$var["logo"]["title"]}}</p>
    </section>
    <section id="goals" class="onepage-section">
        <a href="#goals" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["goals"]["title"]}}</h2>
        <h3>{{$var["goals"]["subtitle"]}}</h3>
        <div class="section-text">
            <div class="custom-scroll-wrapper">
                <div class="custom-scroll-content">
                    {{$var["goals"]["body"]}}
                </div>
            </div>
        </div>
    </section>
    <section id="experience" class="onepage-section">
        <a href="#experience" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["experiences"]["title"]}}</h2>
        <h3>{{$var["experiences"]["subtitle"]}}</h3>
        <div class="section-text">
            <div class="custom-scroll-wrapper">
                <div class="custom-scroll-content">
                    {{$var["experiences"]["body"]}}
                </div>
            </div>
        </div>
    </section>
    <section id="research" class="onepage-section">
        <a href="#research" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["research"]["title"]}}</h2>
        <h3>{{$var["research"]["subtitle"]}}</h3>
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
    <section id="papers" class="onepage-section">
        <a href="#papers" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["papers"]["title"]}}</h2>
        <h3>{{$var["papers"]["subtitle"]}}</h3>
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
        <a href="#" class="section-btn-all">CLICK TO VIEW MORE POST</a>
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
    <section id="tools" class="onepage-section">
        <a href="#tools" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["tools"]["title"]}}</h2>
        <h3>{{$var["tools"]["subtitle"]}}</h3>
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

@endsection

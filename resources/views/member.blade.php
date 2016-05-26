@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/member.css')}}"/>
    <script src="js/actions.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            $(".navbar").on("activate.bs.scrollspy", function(){
                var x = $(".nav li.active > a").attr('href');
                $(x).addClass('visited');
            });
            $('#nav-container').on('affixed.bs.affix', function() {
                $('#introduction').addClass('shrink');
               $('#card').addClass('show');
            });
            $('#nav-container').on('affixed-top.bs.affix', function(){
                $('#introduction').removeClass('shrink');
                $('#card').removeClass('show');
            });
        });
    </script>
@endsection

@section('menu')
    <li class=""><a href="home">Website Home</a></li>
    <li class="active"><a href="#introduction">Introduction</a></li>
    <li class=""><a href="#research">Research</a></li>
    <li class=""><a href="#academic">Academic</a></li>
    <li class=""><a href="#career">Career</a></li>
    <li class=""><a href="#contact">Contact</a></li>
    <li class=""><a href="#skills">Skills</a></li>
@endsection

@section('content')
    <section id="introduction" class="page-header member-section visited">
        <div class="animate-holder">
            <div class="animate-left animate">
                <div class="logo-on-member-header">
                    <img src="images/header-logo-raw.png" class="header-logo">
                    <h2 class="member-dec">{{$member->body}}</h2>
                </div>
            </div>
            <div class="animate-right animate">
                <div class="member-on-header">
                    <div class="img-wrapper"><img src="{{$member->photo->path}}"></div>
                    <h1>{{$member->firstname}} {{$member->lastname}}</h1>
                    <h2>{{$member->position}}</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="research" class="member-section">
        <a href="#research" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Research Areas</h2>
        <div class="animate-holder">
            <div class="animate-left animate">
                <a href="#" class="research-btn-all">CLICK TO VIEW PUBLICATIONS</a>
            </div>
            <div class="animate-right animate">
                @foreach( explode("#",$member->researchareas) as $res)
                    <p>{{$res}}</p>
                @endforeach
            </div>
        </div>
    </section>
    <section id="academic" class="member-section">
        <a href="#academic" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Academic Background</h2>
        <div class="animate-holder">
            <div class="animate-left animate">
                @foreach($member->records()->get() as $rec)
                    @if($rec->type == "academic")
                        <div class="member-rec">
                            <div class="row"><span>Institute:</span> {{$rec->institute}} </div>
                            <div class="row"><span>Degree:</span> {{$rec->position}} </div>
                            <div class="row"><span>From:</span> {{$rec->start}} <span>To:</span> {{$rec->end}} </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section id="career" class="member-section">
        <a href="#career" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Career</h2>
        <div class="animate-holder">
            <div class="animate-right animate">
                @foreach($member->records()->get() as $rec)
                    @if($rec->type != "academic")
                        <div class="member-rec">
                            <div class="row"><span>Institute:</span> {{$rec->institute}} </div>
                            <div class="row"><span>Position:</span> {{$rec->position}} </div>
                            <div class="row"><span>From:</span> {{$rec->start}} <span>To:</span> {{$rec->end}} </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section id="contact" class="member-section">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Contact Info</h2>
        <div class="animate-holder">
            <div class="animate-left animate">
                <div class="footer-info"><span class="fa fa-envelope fa-2x pull-left"></span><p class="solo">info@ticksoft.sbu.ac.ir</p></div>
                <div class="footer-info"><span class="fa fa-phone fa-2x pull-left"></span><p class="solo">+9821-22 90 4196</p></div>
            </div>
            <div class="animate-right animate">
                <a class="social fb" href="#"><span class="fa fa-facebook fa-2x"></span></a>
                <a class="social tw" href="#"><span class="fa fa-twitter fa-2x"></span></a>
                <br>
                <a class="social gp" href="#"><span class="fa fa-google-plus fa-2x"></span></a>
                <a class="social ld" href="#"><span class="fa fa-linkedin fa-2x"></span></a>
            </div>
        </div>
    </section>
    <section id="skills" class="member-section">
        <a href="#skills" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <div class="animate-holder">
            <div class="animate-left animate">left</div>
            <div class="animate-right animate">right</div>
        </div>
    </section>
    @include('footer',['top'=>'introduction']);
@endsection

@section('absolutes')
    <div id="card">
        <div class="img-wrapper"><img src="{{$member->photo->path}}"></div>
        <p class="name">{{$member->firstname}} {{$member->lastname}}</p>
    </div>
@endsection
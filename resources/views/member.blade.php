@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/member.css')}}"/>
    @if($lang == "fa")
        <link rel="stylesheet" type="text/css" href="{{asset('css/farsi.css')}}"/>
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
    @endif
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
    @if($lang == 'fa')
        <li class=""><a href="home">صفحه اصلی</a></li>
        <li class="active"><a href="#introduction">معرفی</a></li>
        <li class=""><a href="#fields">تخصص ها</a></li>
        <li class=""><a href="#background">سوابق</a></li>\
        <li class=""><a href="#contact">راه های ارتباطی</a></li>
        <li class=""><a href="#papers">مقالات</a></li>
    @else
        <li class=""><a href="home">Website Home</a></li>
        <li class="active"><a href="#introduction">Introduction</a></li>
        <li class=""><a href="#fields">Fields</a></li>
        <li class=""><a href="#background">Background</a></li>
        <li class=""><a href="#contact">Contact</a></li>
        <li class=""><a href="#papers">Papers</a></li>
    @endif
@endsection

@section('content')
    <section id="introduction" class="page-header member-section visited">
        <div class="member-on-header">
            <div class="img-wrapper"><img src="{{$member->photo->path}}"></div>
            <h1>{{$member->firstname}} {{$member->lastname}}</h1>
            <h2>{{$member->position}}</h2>
        </div>
    </section>
    <section id="fields" class="member-section tab-section">
        <a href="#fields" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Fields</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#field-tab1">Industry</a></li>
                <li><a data-toggle="pill" href="#field-tab2">Research</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="field-tab1" class="tab-pane fade in active field-tab">
                    {{--@foreach( explode("#",$member->researchareas) as $res)--}}
                        {{--<p>{{$res}}</p>--}}
                    {{--@endforeach--}}
                    <div class="custom-scroll-wrapper field-wrapper">
                        <div class="custom-scroll-content">

                            @for($i = 0; $i<18; $i++)
                                <p class="field-item">some industrial field</p>
                            @endfor
                        </div>
                        {{--<a class="animate-modal-btn"></a>--}}
                    </div>
                </div>
                <div id="field-tab2" class="tab-pane fade field-tab">
                    {{--@foreach( explode("#",$member->researchareas) as $res)--}}
                        {{--<p>{{$res}}</p>--}}
                    {{--@endforeach--}}
                    <div class="custom-scroll-wrapper field-wrapper">
                        <div class="custom-scroll-content">

                            @for($i = 0; $i<18; $i++)
                                <p class="field-item">some research field</p>
                            @endfor
                        </div>
                        {{--<a class="animate-modal-btn"></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="background" class="member-section tab-section">
        <a href="#background" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Background</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#record-tab1">Industry</a></li>
                <li><a data-toggle="pill" href="#record-tab2">Academic</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="record-tab1" class="tab-pane fade in active">
                    @foreach($member->records()->get() as $rec)
                        @if($rec->type != "academic")
                            <div class="member-rec">
                                <div class="row"><span>From:</span> {{$rec->start}} <span>To:</span> {{$rec->end}} </div>
                                <div class="row"><span>Institute:</span> {{$rec->institute}} </div>
                                <div class="row"><span>Degree:</span> {{$rec->position}} </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div id="record-tab2" class="tab-pane fade">
                    @foreach($member->records()->get() as $rec)
                        @if($rec->type == "academic")
                            <div class="member-rec">
                                <div class="row"><span>From:</span> {{$rec->start}} <span>To:</span> {{$rec->end}} </div>
                                <div class="row"><span>Institute:</span> {{$rec->institute}} </div>
                                <div class="row"><span>Degree:</span> {{$rec->position}} </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="member-section">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Contact Info</h2>
        <div class="contact-card">
            <div class="contact-row"><label>Phone</label><p>0212234356</p></div>
            <div class="contact-row"><label>E-Mail</label><p>test@test.test</p></div>
            <div class="contact-row"><label>Mobile</label><p>092348473472</p></div>
        </div>
        <div class="contact-socials">
            <h3>Social Network</h3>
            <a class="social fb" href="#"><span class="fa fa-facebook "></span></a>
            <a class="social tw" href="#"><span class="fa fa-twitter "></span></a>
            <a class="social gp" href="#"><span class="fa fa-google-plus"></span></a>
            <a class="social ld" href="#"><span class="fa fa-linkedin"></span></a>
        </div>
    </section>
    <section id="papers" class="member-section">
        <a href="#papers" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">Papers</h2>
        <div class="section-text">
            {{--<div class="auto-scroll-wrapper">--}}
            {{--<div class="auto-scroll">--}}
            <div class="custom-scroll-wrapper">
                <div class="custom-scroll-content">
                    papers
                </div>
                {{--<a class="animate-modal-btn"></a>--}}
            </div>
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </section>
    @include('footer',['top'=>'introduction']);
@endsection

@section('absolutes')
    <div id="card">
        {{--<div class="img-wrapper"><img src="{{$member->photo->path}}"></div>--}}
        <p class="name">{{$member->firstname}} {{$member->lastname}}</p>
    </div>
@endsection
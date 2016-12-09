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

            $(".field-item").click(function(){
                $('#field-item-modal').modal();
                var item1 = $( ".full" );
                $('#field-item-modal .modal-body').html($(this).find(item1).html());
                $('#field-item-modal').modal("show");
            });
        });
    </script>
@endsection

@section('menu')
    @if($lang == 'fa')
        <li class=""><a href="{{route("home")}}#home">صفحه اصلی</a></li>
        <li class="onepage active"><a href="#introduction">معرفی</a></li>
        <li class="onepage"><a href="#fields">تخصص ها</a></li>
        <li class="onepage"><a href="#background">سوابق</a></li>\
        <li class="onepage"><a href="#contact">راه های ارتباطی</a></li>
        <li class="onepage"><a href="#papers">مقالات</a></li>
    @else
        <li class=""><a href="{{route("home")}}#home">Website Home</a></li>
        <li class="onepage active"><a href="#introduction">Introduction</a></li>
        <li class="onepage"><a href="#fields">Fields</a></li>
        <li class="onepage"><a href="#background">Background</a></li>
        <li class="onepage"><a href="#contact">Contact</a></li>
        <li class="onepage"><a href="#papers">Papers</a></li>
    @endif
@endsection

@section('content')
    <section id="introduction" class="page-header member-section visited">
        <div class="member-on-header">
            <div class="img-wrapper"><img src="{{$member->photo->path}}"></div>
            <h1>{{$member->firstname}} {{$member->lastname}}</h1>
            <h2>{{$member->position}}</h2>
            <h2>{{$member->email}}</h2>
        </div>
    </section>
    <section id="fields" class="member-section tab-section">
        <a href="#fields" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">{{$vars["memberField"]["title"]}}</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#field-tab1">{{$vars["memberField"]["subtitle"]}}</a></li>
                <li><a data-toggle="pill" href="#field-tab2">{{$vars["memberField"]["body"]}}</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="field-tab1" class="tab-pane active in fade field-tab">
                    <div class="custom-scroll-wrapper field-wrapper">
                        <div class="custom-scroll-content">
                            @foreach(explode("#",$member->researchareas) as $res)
                                <p class="field-item">{{str_limit($res,45)}}<span class="full">{{$res}}</span></p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="field-tab2" class="tab-pane fade field-tab">
                    <div class="custom-scroll-wrapper field-wrapper">
                        <div class="custom-scroll-content">
                            @foreach(explode("#",$member->industrialareas) as $res)
                                <p class="field-item">{{str_limit($res,45)}}<span class="full">{{$res}}</span></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="background" class="member-section tab-section">
        <a href="#background" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">{{$vars["memberBackground"]["title"]}}</h2>
        <div class="section-nav-container">
            <ul class="nav nav-pills text-center">
                <li class="active"><a data-toggle="pill" href="#record-tab1">{{$vars["memberBackground"]["subtitle"]}}</a></li>
                <li><a data-toggle="pill" href="#record-tab2">{{$vars["memberBackground"]["body"]}}</a></li>
            </ul>
        </div>
        <div class="col-sm-12 section-tab-container">
            <div class="tab-content">
                <div id="record-tab1" class="tab-pane fade in active">
                    @if(count($member->records()->get())==0)
                        <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                    @endif
                    @foreach($member->records()->get() as $rec)
                        @if($rec->type == "academic")
                            <div class="member-rec">
                                <div class="row">{{$rec->start}} <span>-</span> {{$rec->end}} </div>
                                <div class="row"> {{$rec->institute}} </div>
                                <div class="row"> {{$rec->position}} </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div id="record-tab2" class="tab-pane fade">
                    @if(count($member->records()->get())==0)
                        <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                    @endif
                    @foreach($member->records()->get() as $rec)
                        @if($rec->type != "academic")
                            <div class="member-rec">
                                <div class="row"> {{$rec->start}} - {{$rec->end}} </div>
                                <div class="row"> {{$rec->institute}} </div>
                                <div class="row"> {{$rec->position}} </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="member-section">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">{{$vars["memberContact"]["title"]}}</h2>
        <div class="contact-card">
            <div class="contact-row"><label>Phone</label><p>{{$member->tel}}</p></div>
            <div class="contact-row"><label>E-Mail</label><p>{{$member->email}}</p></div>
            <div class="contact-row"><label>Mobile</label><p>{{$member->mobile}}</p></div>
        </div>
        <div class="contact-socials">
            <h3>{{$vars["memberContact"]["subtitle"]}}</h3>
            <a class="social fb" href="{{$member->facebook}}"><span class="fa fa-facebook "></span></a>
            <a class="social tw" href="{{$member->twitter}}"><span class="fa fa-twitter "></span></a>
            <a class="social gp" href="{{$member->googleplus}}"><span class="fa fa-google-plus"></span></a>
            <a class="social ld" href="{{$member->linkedin}}"><span class="fa fa-linkedin"></span></a>
        </div>
    </section>
    @if(count($member->papers > 0))
    <section id="papers" class="member-section">
        <a href="#papers" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2 class="section-header">{{$vars["memberPaper"]["title"]}}</h2>
        <div class="section-text">
            <div class="custom-scroll-wrapper">
                <div class="custom-scroll-content">
                    {{$member->papers}}
                </div>
            </div>
        </div>
    </section>
    @endif
    @include('footer',['top' => 'blogs-section',"vars" => $vars])
@endsection

@section('absolutes')
    <div id="card">
        {{--<div class="img-wrapper"><img src="{{$member->photo->path}}"></div>--}}
        <p class="name">{{$member->firstname}} {{$member->lastname}}</p>
    </div>
    <div id="field-item-modal" class="modal fade" role="dialog">
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
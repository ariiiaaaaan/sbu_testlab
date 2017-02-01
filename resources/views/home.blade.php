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

            var getcaptcha = function(){
                $.ajax(
                        {
                            url : "getcaptcha",
                            type: "GET",
                            data : null,
                            success:function(data)
                            {
                                $('#captcha-modal img').attr("src",data)
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("failed to get captcha");
                            }
                        });
            };

            $("#contact-form .send").click(function(){
//                getcaptcha();
                $('#captcha-modal').modal();
                $('#captcha-modal').modal("show");
            });

            $("#captcha-reload").click(getcaptcha);

            $("#captcha-submit").click(function(){
                $("#captcha-hidden").attr("value",$("#captcha-visible").val());
                var postData = $("#contact-form").serializeArray();
                $.ajax(
                        {
                            url : "contact",
                            type: "GET",
                            data : postData,
                            success:function(data)
                            {
                                alert(data);
                                $('#captcha-modal').modal("hide");
                                alert("{{$lang == "en" ? "Your message is sent for admin" : "پیغام شما برای مدیر ارسال شد"}}");
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("{{$lang == "en" ? "There was a problem while sending your message. Check the captcha code. You can send an email to the admin via the address mentioned in contact information." : "خطا در ارسال پیغام. لطفا کد امنیتی را درست وارد کنید. اگر همچنان با خطا مواجه میشوید، میتوانید پیغام خود را به آدرس ایمیل که در اطلاعات تماس نوشته شده بفرستید."}}");
                                getcaptcha();
                            }
                        });
            });

            $(document).keydown(function(e){
                if(e.keyCode == 40){
                    var next = $("li.onepage.active").next();
                    if(next.hasClass("onepage"))
                        next.find("a").click();
                    else
                        $("li.onepage").first().find("a").click();
                }else if(e.keyCode == 38){
                    var prev = $("li.onepage.active").prev();
                    if(prev.hasClass("onepage"))
                        prev.find("a").click();
                    else
                        $("li.onepage").first().find("a").click();
                }
                else if(e.keyCode == 37){
                    var section = $("li.onepage.active a").attr("href");
                    $(section).find("span.fa-angle-left").click();
                }else if(e.keyCode == 39){
                    var section = $("li.onepage.active a").attr("href");
                    $(section).find("span.fa-angle-right").click();
                }

            });
        });
    </script>
@endsection

@section('menu')
    @include('nav',["preurl"=>"","lang"=>$lang,"class"=>"onepage"])
@endsection

@section('content')
    <section id="home" class="onepage-section one-view">
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
        @if($lang == "en")
            <a href="about" class="section-btn-all">View About Page</a>
        @else
            <a href="about" class="section-btn-all">مشاهده‌ی صفحه‌ی معرفی</a>
        @endif
    </section>
    <section id="industry" class="onepage-section tab-section one-view">
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
                                    <div class="p">
                                        {!!$service->body!!}
                                    </div>
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
                                    <div class="p">
                                        {!!$field->body!!}
                                    </div>
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
    <section id="events" class="onepage-section one-view">
        <a href="#events" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["events"]["title"]}}</h2>
        <h3>{{$var["events"]["subtitle"]}}</h3>
        <div class="hider">
            <div id="event-wrapper">
                    @for($i = 0; $i<14; $i++)
                        <div class="event @if(mt_rand()%10 < 4 ) highlight @endif color{{mt_rand()%6 + 1}}">
                            <div class="overlay">
                                <p class="day">{{$i+15}}</p>
                                <p class="month">آذر</p>
                            </div>
                            <div class="content">
                                <h3 class="title">رویداد خالی</h3>
                                <p class="location"></p>
                                <p class="time"></p>
                                <p class="desc"></p>
                            </div>
                        </div>
                    @endfor
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="events-next"></span>
        <span class="fa fa-angle-left fa-4x" id="events-prev"></span>
    </section>
    <section id="blogs" class="onepage-section tree-view">
        <a href="#blogs" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["blogs"]["title"]}}</h2>
        <h3>{{$var["blogs"]["subtitle"]}}</h3>
        <div id="blog-wrapper" class="card-wrapper">
            @foreach($content["blogs"] as $blog)
             @include("card",["class"=>"blog","content"=>$blog])
            @endforeach
        </div>
        @if($lang == "en")
            <a href="contents?type=blogs" class="section-btn-all">CLICK TO VIEW MORE POST</a>
        @else
            <a href="contents?type=blogs" class="section-btn-all">مشاهده‌ی تمام بلاگ‌ها</a>
        @endif

    </section>
    <section id="members" class="onepage-section one-view">
        <a href="#members" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["members"]["title"]}}</h2>
        <h3>{{$var["members"]["subtitle"]}}</h3>
        <div class="hider">
            <div id="member-wrapper">
                @foreach($content["members"] as $member)
                    <div class="member"><a href="member?id={{$member->id}}">
                        <img src="{{$member->photo->path or "images/service1.png"}}">
                        <h4>{{$member->firstname}}&nbsp{{$member->lastname}}</h4>
                        <h5>{{$member->position}}</h5>
                        </a></div>
                @endforeach
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="members-next"></span>
        <span class="fa fa-angle-left fa-4x" id="members-prev"></span>
    </section>
    <section id="didactics" class="onepage-section tree-view">
        <a href="#didactics" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["didactics"]["title"]}}</h2>
        <h3>{{$var["didactics"]["subtitle"]}}</h3>
        <div id="didactic-wrapper" class="card-wrapper">
            @foreach($content["didactics"] as $blog)
                @include("card",["class"=>"blog","content"=>$blog])
            @endforeach
        </div>
        @if($lang == "en")
            <a href="contents?type=didactics" class="section-btn-all">CLICK TO VIEW MORE POST</a>
        @else
            <a href="contents?type=didactics" class="section-btn-all">مشاهده‌ی تمام مطالب</a>
        @endif
    </section>
    <section id="resources" class="onepage-section tab-section one-view">
        <a href="#resources" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["resources"]["title"]}}</h2>
        <h3>{{$var["resources"]["subtitle"]}}</h3>
        <div class="link-tab">
        <div class="custom-scroll-wrapper link-wrapper">
            <div class="custom-scroll-content">
                @if(count($content["resources"]) > 0)
                    @foreach($content["resources"] as $res)
                        <a href="{{$res->body}}" class="link-item">{{$res->title}}</a>
                    @endforeach
                @else
                    <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                @endif
            </div>
        </div>
        </div>
    </section>
    <section id="researches" class="onepage-section tab-section two-view">
        <a href="#researches" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
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
                    @if(count($content["researchesours"])==0)
                        <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                    @endif
                    @foreach($content["researchesours"] as $res)
                        <div class="research">
                            <h4>{{str_limit($res->title,60)}}</h4>
                            <h5>{{$res->research->author}}</h5>
                            <div class="p">{!! str_replace("<p>&nbsp;</p>"," ",preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/',' ',str_limit($res->body,350))))."</p></span>" !!}</div>
                            <a href="content?id={{$res->id}}" class="research-btn">{{$lang == "en" ? "CLICK TO VIEW POST" : "مشاهده ی مطلب"}}</a>
                        </div>
                    @endforeach
                        @if($lang == "en")
                            <a href="contents?type=researches?external=0" class="section-btn-all">CLICK TO VIEW MORE POST</a>
                        @else
                            <a href="contents?type=researches" class="section-btn-all">مشاهده‌ی تمام مطالب</a>
                        @endif
                </div>
                <div id="resource-tab2" class="tab-pane fade">
                    @if(count($content["researchesexternal"])==0)
                        <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                    @endif
                    @foreach($content["researchesexternal"] as $res)
                        <div class="research">
                            <h4>{{str_limit($res->title,60)}}</h4>
                            <h5>{{$res->research->author}}</h5>
                            <div class="p">{!! str_replace("<p>&nbsp;</p>"," ",preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/',' ',str_limit($res->body,350))))."</p></span>" !!}</div>
                            <a href="content?id={{$res->id}}" class="research-btn">{{$lang == "en" ? "CLICK TO VIEW POST" : "مشاهده ی مطلب"}}</a>
                        </div>
                    @endforeach
                        @if($lang == "en")
                            <a href="contents?type=researches?external=1" class="section-btn-all">CLICK TO VIEW MORE POST</a>
                        @else
                            <a href="contents?type=researches?external=1" class="section-btn-all">مشاهده‌ی تمام مطالب</a>
                        @endif
                </div>
            </div>
        </div>
    </section>
    <section id="companies" class="onepage-section one-view">
        <a href="#companies" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["companies"]["title"]}}</h2>
        <h3>{{$var["companies"]["subtitle"]}}</h3>
        <div class="hider">
            <div id="company-wrapper">
                @if(count($content["companies"])==0)
                    <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
                @endif
                @foreach($content["companies"] as $comp)
                    <div class="company">
                        <img src={{$comp->photos->first()->path or "images/qmark.png"}}>
                        <h4>{{$comp->title}}</h4>
                        <p>
                            {!!$comp->body!!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        <span class="fa fa-angle-right fa-4x" id="company-next"></span>
        <span class="fa fa-angle-left fa-4x" id="company-prev"></span>
    </section>
    <section id="gallery" class="onepage-section tree-view">
        <a href="#gallery" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["galleries"]["title"]}}</h2>
        <h3>{{$var["galleries"]["subtitle"]}}</h3>
        <div id="gallery-wrapper">
            @foreach($content["galleries"] as $gal)
                <div class="gallery item {{$gal->category or "all"}} ">
                    <a href="gallery?id={{$gal->id}}">
                    <h4>{!! str_limit($gal->title,30) !!}</h4>
                    <div class="gallery-body">
                        <div class="p">
                            {!!str_limit($gal->body,250)!!}
                        </div>
                            <img src="{{$gal->photos->first()->path or "non"}}">
                    </div>
                    @if($lang == "en")
                        <a href="gallery?id={{$gal->id}}" class="gallery-btn">CLICK TO VIEW GALLERY</a>
                    @else
                        <a href="gallery?id={{$gal->id}}" class="gallery-btn">مشاهده‌ی گالری</a>
                    @endif
                    </a>
                </div>
            @endforeach
        </div>
        @if($lang == "en")
            <a href="galleries" class="section-btn-all">View About Page</a>
        @else
            <a href="galleries" class="section-btn-all">مشاهده تمام آلبوم ها </a>
        @endif
    </section>
    <section id="contact" class="onepage-section two-view">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["contact"]["title"]}}</h2>
        <h3>{{$var["contact"]["subtitle"]}}</h3>
        <div class="form-wrapper pull-right">
            <form id="contact-form">
                <input type="text" class="name" name="name" {{$lang=="en" ? "placeholder=Name" : "placeholder=نام"}}>
                <input type="email" class="email" name="email" {{$lang=="en" ? "placeholder=Email" : "placeholder=ایمیل"}}>
                <textarea class="body" name="body" {{$lang=="en" ? "placeholder=Messagث" : "placeholder=پیغام"}}></textarea>
                <input type="hidden" name="captcha" id="captcha-hidden">
                <input type="button" class="send pull-left" {{$lang=="en" ? "value=SEND" : "value=ارسال"}}>
            </form>
        </div>
        <div class="links-wrapper pull-left">
            <div class="info">
                <div class="footer-info"><span class="fa fa-clock-o fa-2x pull-left"></span><p>{{$lang=="en" ? "Office Hours" : "ساعات کاری"}}</p><p>{{$var["office-hours"]["title"]}}</p></div>
                <div class="footer-info"><span class="fa fa-phone fa-2x pull-left"></span><p>{{$lang=="en" ? "Phone Number" : "تلفن"}}</p><p class="solo">{{$var["tell"]["title"]}}</p></div>
                <div class="footer-info"><span class="fa fa-map-marker fa-2x pull-left"></span><P>{{$var["address"]["title"]}}</P><p>{{$var["address"]["subtitle"]}}</p></div>
                <div class="footer-info"><span class="fa fa-envelope fa-2x pull-left"></span><p>{{$lang=="en" ? "Email" : "ایمیل"}}</p><p class="solo">{{$var["email"]["title"]}}</p></div>
            </div>
            <div class="socials">
                <a class="fb" href="{{$var["facebook"]["title"]}}"><span class="fa fa-facebook fa-2x"></span></a>
                <a class="tw" href="{{$var["twitter"]["title"]}}"><span class="fa fa-twitter fa-2x"></span></a>
                <a class="tg" href="{{$var["telegram"]["title"]}}"><span class="fa fa-telegram fa-2x"></span></a>
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
    <div id="captcha-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <img src="{{$captcha}}">
                    <input type="text" id="captcha-visible">
                    <span id="captcha-reload" class="fa fa-refresh"></span>
                    <input type="button" {{$lang=="en" ? "value=SEND" : "value=ارسال"}} id="captcha-submit">
                </div>
            </div>
        </div>
    </div>

@endsection
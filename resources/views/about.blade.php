
@extends('master')

@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/masonry-horizontal.js"></script>
    <script type="text/javascript">
        $( window ).load( function()
        {
            $(".link-item").click(function(){
                $('#field-item-modal').modal();
                var item1 = $( ".full" );
                $('#field-item-modal .modal-body').html($(this).find(item1).html());
                $('#field-item-modal').modal("show");
            });
        });
    </script>
@endsection

@section('menu')
    @if($lang == "en")
        <li class=""><a href="{{route("home")}}#home">Website Home</a></li>
        <li class="onepage"><a href="#goals">Goals</a></li>
        <li class="onepage"><a href="#experience">Experience</a></li>
        <li class="onepage"><a href="#research">Research areas</a></li>
        <li class="onepage"><a href="#papers">Papers</a></li>
        <li class="onepage"><a href="#members">Members</a></li>
        <li class="onepage"><a href="#tools">Tools</a></li>
    @else
        <li class=""><a href="{{route("home")}}#home">صفحه اصلی</a></li>
        <li class="onepage"><a href="#goals">اهداف</a></li>
        <li class="onepage"><a href="#experience">سوابق</a></li>
        <li class="onepage"><a href="#research">زمینه‌های تحقیقاتی</a></li>
        <li class="onepage"><a href="#papers">مقالات</a></li>
        <li class="onepage"><a href="#members">اعضا</a></li>
        <li class="onepage"><a href="#tools">ابزارها</a></li>
    @endif
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
                    @foreach($content["researchereas"] as $res)
                        <p class="link-item">{{str_limit($res,45)}}<span class="full">{{$res}}</span></p>
                    @endforeach
                </div>
                {{--<a class="animate-modal-btn"></a>--}}
            </div>
        </div>
    </section>
    <section id="papers" class="onepage-section two-view">
        <a href="#papers" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["papers"]["title"]}}</h2>
        <h3>{{$var["papers"]["subtitle"]}}</h3>
        @if(count($content["researchesours"])==0)
            <div class="no-content">{{$lang=="en" ? "Content of this section will be provided soon." : "محتوای این قسمت به زودی تهیه خواهد شد."}}</div>
        @endif
        @foreach($content["researchesours"] as $res)
            <div class="research">
                <h4>{{str_limit($res->title,60)}}</h4>
                <h5>{{$res->research->author}}</h5>
                <div class="p">{!! str_replace("<p>&nbsp;</p>"," ",preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/',' ',str_limit($res->body,350))))."</p></span>" !!}</div>
                <a href="content?id={{$res->id}}" class="research-btn">CLICK TO VIEW POST</a>
            </div>
        @endforeach
        @if($lang == "en")
            <a href="contents?type=researches?external=0" class="section-btn-all">CLICK TO VIEW MORE POST</a>
        @else
            <a href="contents?type=researches" class="section-btn-all">مشاهده‌ی تمام مطالب</a>
        @endif
    </section>
    <section id="members" class="onepage-section">
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
    <section id="tools" class="onepage-section tree-view">
        <a href="#tools" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["tools"]["title"]}}</h2>
        <h3>{{$var["tools"]["subtitle"]}}</h3>
        <div id="tools-wrapper" class="card-wrapper">
            @foreach($content["tools"] as $blog)
                @include("card",["class"=>"blog","content"=>$blog])
            @endforeach
        </div>
        @if($lang == "en")
            <a href="contents?type=tools" class="section-btn-all">CLICK TO VIEW MORE POST</a>
        @else
            <a href="contents?type=tools" class="section-btn-all">مشاهده‌ی تمام مطالب</a>
        @endif
    </section>
    <section id="contact" class="onepage-section two-view">
        <a href="#contact" class="section-down-btn"><span class="fa fa-angle-down fa-4x"></span></a>
        <h2>{{$var["contact"]["title"]}}</h2>
        <h3>{{$var["contact"]["subtitle"]}}</h3>
        <div class="form-wrapper pull-right">
            <form id="contact-form">
                <input type="text" class="name" {{$lang=="en" ? "placeholder=Name" : "placeholder=نام"}}>
                <input type="email" class="email" {{$lang=="en" ? "placeholder=Email" : "placeholder=ایمیل"}}>
                <textarea class="body" {{$lang=="en" ? "placeholder=Messagث" : "placeholder=پیغام"}}></textarea>
                <input type="submit" class="send pull-left" {{$lang=="en" ? "value=SEND" : "value=ارسال"}}>
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

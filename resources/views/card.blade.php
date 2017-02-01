<div class="card {{$class}} @if(empty($content->photo->path)) no-img @endif ">
    <a href="content?id={{$content->id}}">
        <h4>{!! str_limit($content->title,35) !!}</h4>
        @if(isset($type) && $type == true)
            <div class="card-date"><span class="fa fa-tag fa-2 2x"></span>{{$lang == "en" ? $content->type : $content->farsiType()}}</div>
        @else
            <div class="card-date"><span class="fa fa-calendar fa-2 2x"></span>{{$content->getDate()}}</div>
        @endif
        <div class="p">
            {!! str_replace("<p>&nbsp;</p>"," ",preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/',' ',$content->body))) !!}
        </div>
        <img src="{{$content->photo->path or "images/service1.png"}}">
        @if($lang == "en")
            <a href="content?id={{$content->id}}" class="card-btn">CLICK TO VIEW POST</a>
        @else
            <a href="content?id={{$content->id}}" class="card-btn">مشاهده‌ی مطلب</a>
        @endif
    </a>
</div>
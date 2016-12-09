<div class="card flex {{$class}} @if(empty($content->photo->path)) no-imgs @endif ">
    <a href="content?id={{$content->id}}">
        <h4>{!! str_limit($content->title,40) !!}</h4>
        <div class="card-date"><span class="fa fa-calendar fa-2 2x"></span>{{date('F d, Y', strtotime($content->created_at))}}</div>
        <div class="p">
            <div class="overflow">
            {!! str_replace("<p>&nbsp;</p>"," ",preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/',' ',$content->body))) !!}
            </div>
            <img src="{{$content->photo->path or "images/service1.png"}}">
        </div>
        {{--<img src="{{$content->photo->path or "images/service1.png"}}">--}}
        <a href="content?id={{$content->id}}" class="card-btn">CLICK TO VIEW POST</a>
    </a>
</div>

@if($level==0)
    <div id="cat-container" class="dl-menuwrapper">
    <span class="fa fa-angle-down fa-2x"></span>
    @if($lang == "en" )
    <input id="selected-cat" type="text" id="cat-select-title" disabled value="{{empty($default) ? "Select category" : $default["title"]}}">
    @else
    <input id="selected-cat" type="text" id="cat-select-title" disabled value={{empty($default) ? "دسته بندی را انتخاب کنید": $default["title"]}}>
    @endif
    <button class="dl-trigger">Open Menu</button>
    <input type="hidden" id="selected-cat-id" name="cat-id" value="{{empty($default) ? 0 : $default["id"]}}">
@endif
    <ul class="cat-nav level{{$level}} @if($level == 0) dl-menu @else dl-submenu @endif">
        @foreach($nodes as $node)
            <li class="cat" cat-id="{{$node["id"]}}">
                <a  name="{{$node["title"]}}"> {{$node["title"]}}</a>
                @if(count($node["children"]) > 0)
                {{--<span class="cat-expand fa fa-caret-down"></span>--}}
                    @include('category',['level' => $level+1,'root' => 0,'nodes'=>$node["children"]])
                @endif
            </li>
        @endforeach
    </ul>
@if($level==0)
</div>
@endif

@if($level==0)
    <div id="cat-container" class="dl-menuwrapper">
    <input id="selected-cat" type="text" id="cat-select-title" disabled value="Select category">
    <input type="hidden" id="selected-cat-id" name="cat-id">
    <button class="dl-trigger">Open Menu</button>
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
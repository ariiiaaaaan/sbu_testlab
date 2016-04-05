<ul class="cat-nav level{{$level}} cat-close">
    @section('outsource')
        @parent
        <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>
    @endsection
    @if(!$root)
        <span class="cat-collapse fa fa-caret-up"></span>
    @endif
    @foreach($nodes as $node)
        <li class="cat" cat-id="{{$node["id"]}}">
            {{$node["title"]}}
            @if(count($node["children"]) > 0)
            <span class="cat-expand fa fa-caret-down"></span>
                @include('category',['level' => $level+1,'root' => 0,'nodes'=>$node["children"]])
            @endif
        </li>
    @endforeach
</ul>
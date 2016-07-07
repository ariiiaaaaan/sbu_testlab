    <ul class="cat-nav level{{$level}}">
        @foreach($nodes as $node)
            <li class="cat">{{$node["title"]}}
                <a href="delete?type=categories&id={{$node["id"]}}">X</a>
                @if(count($node["children"]) > 0)
                    @include('categoryforadmin',['level' => $level+1,'root' => 0,'nodes'=>$node["children"]])
                @endif
            </li>
        @endforeach
    </ul>
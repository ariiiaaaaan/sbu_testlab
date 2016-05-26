@section('outsource')
    @parent
    <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>
    <script src="js/category.js"></script>
@endsection

@if($level==0)
<link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/default.css" />
<link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/component.css" />
<script src="ResponsiveMultiLevelMenu/js/modernizr.custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="ResponsiveMultiLevelMenu/js/jquery.dlmenu.js"></script>
<script>


    $(document).ready(function() {
        $(function() {
            $('#cat-container').dlmenu({
                animationClasses: {classin: 'dl-animate-in-3', classout: 'dl-animate-out-3'}
            });
        });

        $("body").on("click","#cat-container li",function(){
           // alert("r");
//            $("#selectes-cat").attr("value") = $(this).attr("cat-id");
        });
    });
</script>

    <div id="cat-container" class="dl-menuwrapper">
    <input id="selected-cat" type="text" id="cat-select-title" disabled value="Select category">
    <input type="hidden" id="selected-cat-id">
    <button class="dl-trigger">Open Menu</button>
@endif
    <ul class="cat-nav level{{$level}} @if($level == 0) dl-menu @else dl-submenu @endif">
        @if(!$root)
            {{--<span class="cat-collapse fa fa-caret-up"></span>--}}
        @endif
        @foreach($nodes as $node)
            <li class="cat" cat-id="{{$node["id"]}}">
                <a href="#"> {{$node["title"]}}</a>
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
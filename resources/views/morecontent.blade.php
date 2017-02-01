@foreach($contents as $content)
    @include("cardflex",["class"=>"item","content"=>$content,"lang" => $lang])
@endforeach
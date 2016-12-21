<select name="tags[]" multiple class="tag-select">
    @foreach($tags as $tag)
    <option value="{{$tag->title}}" {{array_search($tag->id,$selected)!=false ? "selected" : ""}}>{{$tag->title}}</option>
    @endforeach
</select>
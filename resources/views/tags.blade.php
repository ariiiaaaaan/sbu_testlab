<select name="tags[]" multiple class="tag-select">
    @foreach($tags as $tag)
    <option value="{{$tag->title}}">{{$tag->title}}</option>
    @endforeach
</select>
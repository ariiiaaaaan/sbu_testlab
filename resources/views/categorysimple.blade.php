<select name="category">
    @foreach($cats as $cat)
        <option value="{{$cat->title}}">{{$cat->title}}</option>
    @endforeach
</select>
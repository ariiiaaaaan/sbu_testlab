<select name="category">
    @foreach($catss as $cat)
        <option value="{{$cat->title}}">{{$cat->title}}</option>
    @endforeach
</select>
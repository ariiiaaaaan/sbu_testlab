<div class="form-group dateinput year">
    <label for="year">Year:</label>
    <select class="form-control" name="{{$prefix}}-year">
        @for($i = 2025; $i>2010; $i--)
            <option>{{$i}}</option>
            @endfor
    </select>
</div>
<div class="form-group dateinput month">
    <label for="month">Month:</label>
    <select class="form-control" name="{{$prefix}}-month">
        @for($i = 1; $i<13; $i++)
            <option>{{$i}}</option>
        @endfor
    </select>
</div>
<div class="form-group dateinput day">
    <label for="day">Day:</label>
    <select class="form-control" name="{{$prefix}}-day">
        @for($i = 1; $i<32; $i++)
            <option>{{$i}}</option>
        @endfor
    </select>
</div>
<div class="form-group dateinput time ">
    <label for="time">Time:</label>
    <select class="form-control" name="{{$prefix}}-hour">
        @for($i =0 ; $i<24; $i++)
            <option>@if($i<10){{0}}@endif{{$i}}</option>
        @endfor
    </select>
    {{":"}}
    <select class="form-control" name="{{$prefix}}-minute">
        @for($i =0 ; $i<60; $i++)
            <option>@if($i<10){{0}}@endif{{$i}}</option>
        @endfor
    </select>
</div>

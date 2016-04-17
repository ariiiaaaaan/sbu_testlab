@if(!$member)
<table class="admin-table table table-striped table-bordered">
    <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td class="title">{{$item->title}}</td>
        <td class="body">{{$item->body}}</td>
        <td class="date">{{$item->date_created}}</td>
        <td class="actions"><a class="admin-action delete" href="#" data-type="{{$type}}" data-id="{{$item->id}}">delete</a>&nbsp | &nbsp<a class="admin-action edit" href="editcontent?id={{$item->id}}" data="{{$item->id}}">edit</a> </td>
    </tr>
    @endforeach
</table>
{!! str_replace('/?', '?', $items->render()) !!}
    @else
    <table class="admin-table table table-striped table-bordered">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td class="title">{{$item->firstname}}</td>
                <td class="body">{{$item->lastname}}</td>
                <td class="date">{{$item->email}}</td>
                <td class="actions"><a class="admin-action delete" href="#" data-type="{{$type}}" data-id="{{$item->id}}">delete</a>&nbsp | &nbsp<a class="admin-action edit" href="editcontent?id={{$item->id}}" data="{{$item->id}}">edit</a> </td>
            </tr>
        @endforeach
    </table>
    {!! str_replace('/?', '?', $items->render()) !!}
    @endif
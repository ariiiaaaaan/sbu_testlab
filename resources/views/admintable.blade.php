
@if($type != 'members' && $type != 'tags' && $type != 'variables' && $type != 'categories')
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
        <td class="actions"><a class="admin-action delete" href="delete?type={{$type}}&id={{$item->id}}">delete</a>&nbsp | &nbsp<a class="admin-action edit" href="edit?type={{$type}}&id={{$item->id}}">edit</a> </td>
    </tr>
    @endforeach
    </table>
{!! str_replace('/?', '?', $items->render()) !!}
@elseif($type == 'members')
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
                <td class="actions"><a class="admin-action delete" href="delete?type={{$type}}&id={{$item->id}}">delete</a>&nbsp | &nbsp<a class="admin-action edit" href="edit?type={{$type}}&id={{$item->id}}">edit</a> </td>
            </tr>
        @endforeach
    </table>
    {!! str_replace('/?', '?', $items->render()) !!}
@elseif($type == 'tags')
    @foreach($items as $item)
        <span class="label-primary">{{$item->title}}<a href="delete?type={{$type}}&id={{$item->id}}">X</a></span>
    @endforeach
    {!! str_replace('/?', '?', $items->render()) !!}
@elseif($type == 'categories')
    @include('categoryforadmin',['level' => 0, 'nodes' => $items])
@elseif($type == 'variables')
    <table class="admin-table table table-striped table-bordered">
        <tr>
            <th>Title</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>
    @foreach($items as $item)
        <tr>
            <td class="title">{{$item->title}}</td>
            <td class="body">{{$item->body}}</td>
            <td class="actions"><a class="admin-action edit" href="edit?type={{$type}}&id={{$item->id}}">edit</a> </td>
        </tr>
    @endforeach
    </table>
    {!! str_replace('/?', '?', $items->render()) !!}
@endif
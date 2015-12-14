<table class="admin-table">
    @foreach($items as $items)
    <tr>
        <td class="title">{{$item->title}}</td>
        <td class="body">{{$item->text}}</td>
        <td class="date">{{$item->date}}</td>
        <td class="actions"><a class="admin-action delete" href="#" data-type="{{$type}}" data-id="{{$item->id}}">delete</a> <a class="admin-action edit" href="editcontent?id={{$item->id}}" data="{{$item->id}}">edit</a> </td>
    </tr>
    @endforeach
</table>
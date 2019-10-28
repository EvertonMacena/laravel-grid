<a href="{{route($action['router'], $row->getKey())}}" class="btn btn-danger btn-xs"
   onclick="event.preventDefault(); if(confirm('Dejesa realmente excluir ?')) {document.getElementById('delete-form-{{$row->getKey()}}').submit();}">
    <span class="fa fa-trash-alt"> {{$action['label']}}</span>
</a>

<form id="delete-form-{{$row->getKey()}}" action="{{route($action['router'], $row->getKey())}}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

{!!Form::open(['action' => $action, 'method' => 'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger'])}}
{!!Form::close()!!}


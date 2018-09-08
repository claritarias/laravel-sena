@extends('templates.base')

@section('content')
    <h1 class="page-header">Categorías</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"
                               href="/categorias/{{$category->id}}">Editar</a>
                            <a class="btn btn-sm btn-danger" href="#">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                	<td colspan="3">No hay ninguna categoría todavía.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{$categories->links()}}
@endsection

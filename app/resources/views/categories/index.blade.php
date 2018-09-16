@extends('layouts.app')

@section('content')
    <h1 class="page-header">Categorías</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoría</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category}}</td>
                        <td class="text-right">
                            @include('includes.buttons.edit', ['action' =>
                                $url.'/'.$category->id.'/edit'])
                        </td>
                        <td>
                            @include('includes.buttons.delete', ['action' =>
                                ['CategoriesController@destroy', $category->id]])
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
    <a class="btn btn-primary" href="{{$url}}/create">Agregar una categoría</a>
@endsection

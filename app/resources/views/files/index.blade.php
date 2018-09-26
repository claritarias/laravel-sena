@extends('layouts.app')

@section('content')
    <h1 class="page-header">Fichas</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Ficha</th>
                <th>Programa</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(count($files) > 0)
                @foreach($files as $file)
                    <tr>
                        <td>{{$file->id}}</td>
                        <td>{{$file->file}}</td>
                        <td>{{$programs[$file->id_program]}}</td>
                        <td class="text-right">
                            @include('includes.buttons.edit', ['action' =>
                                $url.'/'.$file->id.'/edit'])
                        </td>
                        <td>
                            @include('includes.buttons.delete', ['action' =>
                                ['FilesController@destroy', $file->id]])
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                	<td colspan="3">No hay ninguna ficha todavía.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{$files->links()}}
    <a class="btn btn-primary" href="{{$url}}/create">Agregar una Ficha</a>
@endsection

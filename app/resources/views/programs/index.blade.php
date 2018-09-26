@extends('layouts.app')

@section('content')
    <h1 class="page-header">Programas</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Programa</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(count($programs) > 0)
                @foreach($programs as $program)
                    <tr>
                        <td>{{$program->id}}</td>
                        <td>{{$program->program}}</td>
                        <td class="text-right">
                            @include('includes.buttons.edit', ['action' =>
                                $url.'/'.$program->id.'/edit'])
                        </td>
                        <td>
                            @include('includes.buttons.delete', ['action' =>
                                ['ProgramsController@destroy', $program->id]])
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                	<td colspan="3">No hay ningún programa todavía.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{$programs->links()}}
    <a class="btn btn-primary" href="{{$url}}/create">Agregar una programa</a>
@endsection

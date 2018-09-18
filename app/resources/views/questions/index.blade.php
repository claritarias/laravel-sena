@extends('layouts.app')

@section('content')
    <h1 class="page-header">Preguntas</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Pregunta</th>
                <th>Categoría</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(count($questions) > 0)
                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$categories[$question->id_category]}}</td>
                        <td class="text-right">
                            @include('includes.buttons.edit', ['action' =>
                                $url.'/'.$question->id.'/edit'])
                        </td>
                        <td>
                            @include('includes.buttons.delete', ['action' =>
                                ['QuestionsController@destroy', $question->id]])
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                	<td colspan="3">No hay ninguna pregunta todavía.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{$questions->links()}}
    <a class="btn btn-primary" href="{{$url}}/create">Agregar una pregunta</a>
@endsection

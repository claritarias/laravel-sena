@extends('layouts.app')

@section('content')
    <h1 class="page-header">Editar Pregunta</h1>
    {!! Form::open(['action' => ['QuestionsController@update', $question->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('question', 'Pregunta')}}
            {{Form::text('question', $question->question, ['class' => 'form-control', 'placeholder'
                => 'Pregunta'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Categoría')}}
            {{Form::select('category', $categories, $question->id_category,
                ['placeholder' => 'Seleccione una categoría...', 'class' =>
                    'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

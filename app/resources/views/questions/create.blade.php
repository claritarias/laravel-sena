@extends('layouts.app')

@section('content')
    <h1 class="page-header">Crear una Pregunta</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('question', 'Pregunta')}}
            {{Form::text('question', '', ['class' => 'form-control', 'placeholder'
                => 'Pregunta'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Categoría')}}
            {{Form::select('category', $categories, null,
                ['placeholder' => 'Seleccione una categoría...', 'class' =>
                    'form-control'])}}
        </div>
        {{Form::submit('Agregar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

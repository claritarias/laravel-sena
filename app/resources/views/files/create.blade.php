@extends('layouts.app')

@section('content')
    <h1 class="page-header">Crear una Ficha</h1>
    {!! Form::open(['action' => 'FilesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('file', 'Ficha')}}
            {{Form::text('file', '', ['class' => 'form-control', 'placeholder'
                => 'Ficha'])}}
        </div>
        <div class="form-group">
            {{Form::label('program', 'Programa')}}
            {{Form::select('program', $programs, null,
                ['placeholder' => 'Seleccione una programa...', 'class' =>
                    'form-control'])}}
        </div>
        {{Form::submit('Agregar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

@extends('layouts.app')

@section('content')
    <h1 class="page-header">Editar Ficha</h1>
    {!! Form::open(['action' => ['FilesController@update', $file->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('file', 'Ficha')}}
            {{Form::text('file', $file->file, ['class' => 'form-control', 'placeholder'
                => 'Ficha'])}}
        </div>
        <div class="form-group">
            {{Form::label('program', 'Programa')}}
            {{Form::select('program', $programs, $file->id_program,
                ['placeholder' => 'Seleccione una programa...', 'class' =>
                    'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

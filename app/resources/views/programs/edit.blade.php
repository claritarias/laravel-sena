@extends('layouts.app')

@section('content')
    <h1 class="page-header">Editar Programa</h1>
    {!! Form::open(['action' => ['ProgramsController@update', $program->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('program', 'Nombre del Programa')}}
            {{Form::text('program', $program->program, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

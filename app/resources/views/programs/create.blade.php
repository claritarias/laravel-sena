@extends('layouts.app')

@section('content')
    <h1 class="page-header">Crear un Programa</h1>
    {!! Form::open(['action' => 'ProgramsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('program', 'Nombre del Programa')}}
            {{Form::text('program', '', ['class' => 'form-control', 'placeholder'
                => 'Nombre del Programa'])}}
        </div>
        {{Form::submit('Agregar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

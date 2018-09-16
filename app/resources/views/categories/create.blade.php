@extends('layouts.app')

@section('content')
    <h1 class="page-header">Crear una Categoría</h1>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('category', 'Categoría')}}
            {{Form::text('category', '', ['class' => 'form-control', 'placeholder'
                => 'Categoría'])}}
        </div>
        {{Form::submit('Agregar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

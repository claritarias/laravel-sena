@extends('layouts.app')

@section('content')
    <h1 class="page-header">Editar Categoría</h1>
    {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('category', 'Categoría')}}
            {{Form::text('category', $category->category, ['class' => 'form-control', 'placeholder'
                => 'Categoría'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
    {!! Form::close() !!}
@endsection

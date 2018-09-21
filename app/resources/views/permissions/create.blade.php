@extends('layouts.app')

@section('title', '| Crear Permisos')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Agregar Permisos</h1>
    <br>

    {{ Form::open(array('url' => 'permisos')) }}

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div><br>
        @if(!$roles->isEmpty())
            <h4>Asignar al Rol</h4>

            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
        @endif
        <br>
        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection

@extends('Layouts.App')

@section('title', 'Nuevo profesor')

@section('content')
    <a href="{{ route('teachers.index') }}" class="volver">← Volver a profesores</a>

    <div class="encabezado">
        <div>
            <h1>Nuevo profesor</h1>
            <p>Registra sus datos de contacto y los módulos que dicta.</p>
        </div>
    </div>

    <form action="{{ route('teachers.store') }}" method="POST" class="panel panel-cuerpo">
        @csrf
        <div class="formulario">
            @include('Profesores.Form', ['teacher' => []])
        </div>

        <div class="botones-form">
            <a href="{{ route('teachers.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Crear profesor</button>
        </div>
    </form>
@endsection

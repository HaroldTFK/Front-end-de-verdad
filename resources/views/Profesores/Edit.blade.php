@extends('Layouts.App')

@section('title', 'Editar profesor')

@section('content')
    <a href="{{ route('teachers.index') }}" class="volver">← Volver a profesores</a>

    <div class="encabezado">
        <div>
            <h1>Editar profesor</h1>
            <p>{{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}</p>
        </div>
    </div>

    <form action="{{ route('teachers.update', $teacher['id']) }}" method="POST" class="panel panel-cuerpo">
        @csrf
        @method('PUT')
        <div class="formulario">
            @include('Profesores.Form')
        </div>

        <div class="botones-form">
            <a href="{{ route('teachers.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Guardar cambios</button>
        </div>
    </form>
@endsection

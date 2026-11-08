@extends('Layouts.App')

@section('title', 'Editar estudiante')

@section('content')
    <a href="{{ route('students.index') }}" class="volver">← Volver a estudiantes</a>

    <div class="encabezado">
        <div>
            <h1>Editar estudiante</h1>
            <p>{{ $student['nombre'] }} {{ $student['apellidos'] }}</p>
        </div>
    </div>

    <form action="{{ route('students.update', $student['id']) }}" method="POST" enctype="multipart/form-data" class="panel panel-cuerpo">
        @csrf
        @method('PUT')
        <div class="formulario">
            @include('Estudiantes.Form')
        </div>

        <div class="botones-form">
            <a href="{{ route('students.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Guardar cambios</button>
        </div>
    </form>
@endsection

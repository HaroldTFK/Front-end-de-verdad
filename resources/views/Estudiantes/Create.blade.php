@extends('Layouts.App')

@section('title', 'Nuevo estudiante')

@section('content')
    <a href="{{ route('students.index') }}" class="volver">← Volver a estudiantes</a>

    <div class="encabezado">
        <div>
            <h1>Nuevo estudiante</h1>
            <p>Completa los datos personales y elige su módulo.</p>
        </div>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="panel panel-cuerpo">
        @csrf
        <div class="formulario">
            @include('Estudiantes.Form', ['student' => []])
        </div>

        <div class="botones-form">
            <a href="{{ route('students.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Crear estudiante</button>
        </div>
    </form>
@endsection

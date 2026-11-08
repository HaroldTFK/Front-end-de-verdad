@extends('Layouts.App')

@section('title', 'Inicio')

@section('content')
    <div class="encabezado">
        <div>
            <h1>Hola, Jonathan</h1>
            <p>Este es el resumen del centro de formación.</p>
        </div>
    </div>

    <div class="resumen">
        <a href="{{ route('students.index') }}"><b>{{ count($students) }}</b><span>Estudiantes</span></a>
        <a href="{{ route('teachers.index') }}"><b>{{ count($teachers) }}</b><span>Profesores</span></a>
        <a href="{{ route('modules.index') }}"><b>{{ count($modules) }}</b><span>Módulos</span></a>
    </div>
@endsection

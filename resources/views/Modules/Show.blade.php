@extends('Layouts.App')

@section('title', $module['nombre'])

@section('content')
    <a href="{{ route('modules.index') }}" class="volver">← Volver a módulos</a>

    <div class="encabezado">
        <div>
            <h1>{{ $module['nombre'] }}</h1>
            <p>Código {{ $module['codigo'] }}</p>
        </div>
        <a href="{{ route('modules.edit', $module['id']) }}" class="btn btn-verde">Editar módulo</a>
    </div>

    <div class="panel panel-cuerpo">
        <p class="titulo-campo">Profesores del módulo</p>
        <div class="opciones">
            @forelse ($module['teachers'] ?? [] as $teacher)
                <a href="{{ route('teachers.show', $teacher['id']) }}" class="etiqueta">
                    {{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}
                </a>
            @empty
                <span class="etiqueta etiqueta-gris">Este módulo aún no tiene profesor</span>
            @endforelse
        </div>
    </div>
@endsection

@extends('Layouts.App')

@section('title', $teacher['nombre'])

@section('content')
    <a href="{{ route('teachers.index') }}" class="volver">← Volver a profesores</a>

    <div class="panel panel-cuerpo">
        <div class="perfil">
            @include('Includes.Avatar', ['foto' => null, 'nombre' => $teacher['nombre'], 'clase' => 'avatar-grande'])
            <div style="flex: 1">
                <h1 style="margin: 0; font-size: 1.6rem; font-weight: 600">{{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}</h1>
                <p style="margin: .25rem 0 0; color: var(--gris)">Identificación {{ $teacher['identificacion'] }}</p>
            </div>
            <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-verde">Editar profesor</a>
        </div>

        <dl class="datos">
            <div>
                <dt>Teléfono</dt>
                <dd>{{ $teacher['telefono'] }}</dd>
            </div>
            <div>
                <dt>Dirección</dt>
                <dd>{{ $teacher['direccion'] }}</dd>
            </div>
            <div style="grid-column: 1 / -1">
                <dt>Módulos que dicta</dt>
                <dd class="opciones" style="margin-top: .5rem">
                    @forelse ($teacher['modules'] ?? [] as $module)
                        <span class="etiqueta">{{ $module['nombre'] }}</span>
                    @empty
                        <span class="etiqueta etiqueta-gris">Sin módulos</span>
                    @endforelse
                </dd>
            </div>
        </dl>
    </div>
@endsection

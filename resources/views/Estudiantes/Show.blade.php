@extends('Layouts.App')

@section('title', $student['nombre'])

@section('content')
    <a href="{{ route('students.index') }}" class="volver">← Volver a estudiantes</a>

    <div class="panel panel-cuerpo">
        <div class="perfil">
            @include('Includes.Avatar', ['foto' => $student['foto'], 'nombre' => $student['nombre'], 'clase' => 'avatar-grande'])
            <div style="flex: 1">
                <h1 style="margin: 0; font-size: 1.6rem; font-weight: 600">{{ $student['nombre'] }} {{ $student['apellidos'] }}</h1>
                <p style="margin: .25rem 0 0; color: var(--gris)">Expediente {{ $student['expediente'] }}</p>
            </div>
            <a href="{{ route('students.edit', $student['id']) }}" class="btn btn-verde">Editar estudiante</a>
        </div>

        <dl class="datos">
            <div>
                <dt>Fecha de nacimiento</dt>
                <dd>{{ \Carbon\Carbon::parse($student['fecha_nac'])->format('d/m/Y') }}</dd>
            </div>
            <div>
                <dt>Módulo</dt>
                <dd>{{ $student['module']['nombre'] ?? 'Sin módulo' }}</dd>
            </div>
        </dl>
    </div>
@endsection

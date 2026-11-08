@extends('Layouts.App')

@section('title', 'Estudiantes')

@section('content')
    <div class="encabezado">
        <div>
            <h1>Estudiantes</h1>
            <p>{{ count($students) }} estudiantes registrados</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-verde">+ Nuevo estudiante</a>
    </div>

    <div class="panel tabla-scroll">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Expediente</th>
                    <th>Fecha de nacimiento</th>
                    <th>Módulo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>
                            <div class="persona">
                                @include('Includes.Avatar', ['foto' => $student['foto'], 'nombre' => $student['nombre']])
                                <strong>{{ $student['nombre'] }} {{ $student['apellidos'] }}</strong>
                            </div>
                        </td>
                        <td>{{ $student['expediente'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($student['fecha_nac'])->format('d/m/Y') }}</td>
                        <td>
                            @if (!empty($student['module']))
                                <span class="etiqueta">{{ $student['module']['nombre'] }}</span>
                            @else
                                <span class="etiqueta etiqueta-gris">Sin módulo</span>
                            @endif
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="{{ route('students.show', $student['id']) }}" class="accion">Ver</a>
                                <a href="{{ route('students.edit', $student['id']) }}" class="accion">Editar</a>
                                <form action="{{ route('students.destroy', $student['id']) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar a este estudiante?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="accion accion-borrar">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="vacio">Aún no hay estudiantes. Crea el primero con el botón “Nuevo estudiante”.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

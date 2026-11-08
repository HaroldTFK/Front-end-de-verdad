@extends('Layouts.App')

@section('title', 'Profesores')

@section('content')
    <div class="encabezado">
        <div>
            <h1>Profesores</h1>
            <p>{{ count($teachers) }} profesores en el equipo</p>
        </div>
        <a href="{{ route('teachers.create') }}" class="btn btn-verde">+ Nuevo profesor</a>
    </div>

    <div class="panel tabla-scroll">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Profesor</th>
                    <th>Identificación</th>
                    <th>Contacto</th>
                    <th>Módulos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>
                            <div class="persona">
                                @include('Includes.Avatar', ['foto' => null, 'nombre' => $teacher['nombre']])
                                <strong>{{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}</strong>
                            </div>
                        </td>
                        <td>{{ $teacher['identificacion'] }}</td>
                        <td>
                            {{ $teacher['telefono'] }}<br>
                            <small style="color: var(--gris)">{{ $teacher['direccion'] }}</small>
                        </td>
                        <td>
                            @forelse ($teacher['modules'] ?? [] as $module)
                                <span class="etiqueta">{{ $module['nombre'] }}</span>
                            @empty
                                <span class="etiqueta etiqueta-gris">Sin módulos</span>
                            @endforelse
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="{{ route('teachers.show', $teacher['id']) }}" class="accion">Ver</a>
                                <a href="{{ route('teachers.edit', $teacher['id']) }}" class="accion">Editar</a>
                                <form action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar a este profesor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="accion accion-borrar">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="vacio">Aún no hay profesores. Crea el primero con el botón “Nuevo profesor”.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

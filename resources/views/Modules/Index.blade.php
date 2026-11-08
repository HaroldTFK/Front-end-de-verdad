@extends('Layouts.App')

@section('title', 'Módulos')

@section('content')
    <div class="encabezado">
        <div>
            <h1>Módulos</h1>
            <p>{{ count($modules) }} módulos de formación</p>
        </div>
        <a href="{{ route('modules.create') }}" class="btn btn-verde">+ Nuevo módulo</a>
    </div>

    <div class="panel tabla-scroll">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Módulo</th>
                    <th>Código</th>
                    <th>Profesor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($modules as $module)
                    <tr>
                        <td><strong>{{ $module['nombre'] }}</strong></td>
                        <td><span class="etiqueta">{{ $module['codigo'] }}</span></td>
                        <td>
                            @forelse ($module['teachers'] ?? [] as $teacher)
                                {{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}
                            @empty
                                <span class="etiqueta etiqueta-gris">Sin profesor</span>
                            @endforelse
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="{{ route('modules.show', $module['id']) }}" class="accion">Ver</a>
                                <a href="{{ route('modules.edit', $module['id']) }}" class="accion">Editar</a>
                                <form action="{{ route('modules.destroy', $module['id']) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar este módulo? También se eliminan sus estudiantes.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="accion accion-borrar">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="vacio">Aún no hay módulos. Crea el primero con el botón “Nuevo módulo”.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@extends('Layouts.App')

@section('title', 'Editar módulo')

@section('content')
    <a href="{{ route('modules.index') }}" class="volver">← Volver a módulos</a>

    <div class="encabezado">
        <div>
            <h1>Editar módulo</h1>
            <p>{{ $module['nombre'] }}</p>
        </div>
    </div>

    <form action="{{ route('modules.update', $module['id']) }}" method="POST" class="panel panel-cuerpo">
        @csrf
        @method('PUT')
        <div class="formulario">
            @include('Modules.Form')
        </div>

        <div class="botones-form">
            <a href="{{ route('modules.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Guardar cambios</button>
        </div>
    </form>
@endsection

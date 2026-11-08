@extends('Layouts.App')

@section('title', 'Nuevo módulo')

@section('content')
    <a href="{{ route('modules.index') }}" class="volver">← Volver a módulos</a>

    <div class="encabezado">
        <div>
            <h1>Nuevo módulo</h1>
            <p>Registra el módulo y, si quieres, su profesor responsable.</p>
        </div>
    </div>

    <form action="{{ route('modules.store') }}" method="POST" class="panel panel-cuerpo">
        @csrf
        <div class="formulario">
            @include('Modules.Form', ['module' => []])
        </div>

        <div class="botones-form">
            <a href="{{ route('modules.index') }}" class="btn btn-borde">Cancelar</a>
            <button type="submit" class="btn btn-verde">Crear módulo</button>
        </div>
    </form>
@endsection

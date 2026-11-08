@extends('Layouts.App')

@section('title', 'Sin conexión')

@section('content')
    <div class="encabezado">
        <div>
            <h1>No hay conexión con la API</h1>
            <p>Revisa que el backend esté encendido y que <code>URL_API</code> en el archivo .env sea correcta.</p>
        </div>
    </div>
    <a href="{{ url()->current() }}" class="btn btn-verde">Intentar de nuevo</a>
@endsection

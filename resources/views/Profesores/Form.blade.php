@php
    // Módulos que ya tiene el profesor (para dejar marcadas las casillas)
    $marcados = old('module_id', collect($teacher['modules'] ?? [])->pluck('id')->all());
@endphp

<div>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" class="campo" required value="{{ old('nombre', $teacher['nombre'] ?? '') }}">
    @error('nombre') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="apellidos">Apellidos</label>
    <input id="apellidos" name="apellidos" class="campo" required value="{{ old('apellidos', $teacher['apellidos'] ?? '') }}">
    @error('apellidos') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="identificacion">Identificación</label>
    <input id="identificacion" name="identificacion" type="number" class="campo" required
        value="{{ old('identificacion', $teacher['identificacion'] ?? '') }}">
    @error('identificacion') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="telefono">Teléfono</label>
    <input id="telefono" name="telefono" class="campo" required value="{{ old('telefono', $teacher['telefono'] ?? '') }}">
    @error('telefono') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div class="completo">
    <label for="direccion">Dirección</label>
    <input id="direccion" name="direccion" class="campo" required value="{{ old('direccion', $teacher['direccion'] ?? '') }}">
    @error('direccion') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div class="completo">
    <p class="titulo-campo">Módulos que dicta</p>
    <div class="opciones">
        @forelse ($modules as $module)
            <label>
                <input type="checkbox" name="module_id[]" value="{{ $module['id'] }}" @checked(in_array($module['id'], $marcados))>
                {{ $module['nombre'] }}
            </label>
        @empty
            <span class="etiqueta etiqueta-gris">Primero crea un módulo</span>
        @endforelse
    </div>
</div>

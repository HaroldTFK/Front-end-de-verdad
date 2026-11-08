<div class="completo">
    <label for="nombre">Nombre del módulo</label>
    <input id="nombre" name="nombre" class="campo" required value="{{ old('nombre', $module['nombre'] ?? '') }}">
    @error('nombre') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="codigo">Código</label>
    <input id="codigo" name="codigo" class="campo" required value="{{ old('codigo', $module['codigo'] ?? '') }}">
    @error('codigo') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="teacher_id">Profesor responsable</label>
    <select id="teacher_id" name="teacher_id" class="campo">
        <option value="">Sin profesor</option>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher['id'] }}" @selected(old('teacher_id', $module['teachers'][0]['id'] ?? '') == $teacher['id'])>
                {{ $teacher['nombre'] }} {{ $teacher['apellidos'] }}
            </option>
        @endforeach
    </select>
</div>

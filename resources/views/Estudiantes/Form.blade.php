{{-- Campos compartidos por Crear y Editar. $student llega vacío al crear --}}
<div>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" class="campo" required value="{{ old('nombre', $student['nombre'] ?? '') }}">
    @error('nombre') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="apellidos">Apellidos</label>
    <input id="apellidos" name="apellidos" class="campo" required value="{{ old('apellidos', $student['apellidos'] ?? '') }}">
    @error('apellidos') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="expediente">Expediente</label>
    <input id="expediente" name="expediente" class="campo" required value="{{ old('expediente', $student['expediente'] ?? '') }}">
    @error('expediente') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="fecha_nac">Fecha de nacimiento</label>
    <input id="fecha_nac" name="fecha_nac" type="date" class="campo" required
        value="{{ old('fecha_nac', isset($student['fecha_nac']) ? substr($student['fecha_nac'], 0, 10) : '') }}">
    @error('fecha_nac') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="module_id">Módulo</label>
    <select id="module_id" name="module_id" class="campo" required>
        <option value="">Elige un módulo</option>
        @foreach ($modules as $module)
            <option value="{{ $module['id'] }}" @selected(old('module_id', $student['module_id'] ?? '') == $module['id'])>
                {{ $module['nombre'] }}
            </option>
        @endforeach
    </select>
    @error('module_id') <p class="error-campo">{{ $message }}</p> @enderror
</div>

<div>
    <label for="foto">Foto</label>
    <input id="foto" name="foto" type="file" accept="image/*" class="campo">
    @error('foto') <p class="error-campo">{{ $message }}</p> @enderror
</div>

{{-- Vista previa de la foto (la actual o la que se acaba de elegir) --}}
<div class="completo foto-actual">
    @include('Includes.Avatar', ['foto' => $student['foto'] ?? null, 'nombre' => $student['nombre'] ?? '?', 'clase' => 'avatar-grande'])
    <p style="color: var(--gris); font-size: .85rem">Al elegir una imagen verás aquí cómo queda.</p>
</div>

<script>
    // Muestra la foto elegida antes de guardar
    document.getElementById('foto').addEventListener('change', function () {
        const archivo = this.files[0];
        if (!archivo) return;

        const vista = document.querySelector('.foto-actual .avatar');
        const img = document.createElement('img');
        img.src = URL.createObjectURL(archivo);
        img.className = 'avatar avatar-grande';
        vista.replaceWith(img);
    });
</script>

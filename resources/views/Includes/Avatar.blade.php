{{-- Muestra la foto, o las iniciales si no tiene foto --}}
@if (!empty($foto))
    <img src="{{ $foto }}" alt="Foto de {{ $nombre }}" class="avatar {{ $clase ?? '' }}">
@else
    <span class="avatar {{ $clase ?? '' }}">{{ strtoupper(mb_substr($nombre ?? '?', 0, 1)) }}</span>
@endif

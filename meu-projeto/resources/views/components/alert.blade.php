@props(['tipo' => 'success'])

@if (isset($slot) && trim($slot) !== '')
    <div class="alert alert-{{ $tipo }}">
        {{ $slot }}
    </div>
@endif

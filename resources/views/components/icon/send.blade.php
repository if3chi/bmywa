<!-- Send -->
@props([
    'strokeWidth' => 2,
])

<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="{{ $strokeWidth }}" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
    <line x1="22" y1="2" x2="11" y2="13"></line>
    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
</svg>

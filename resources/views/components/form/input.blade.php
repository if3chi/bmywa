@props(['label', 'error' => false])

@php
    $classes = $error 
                ? 'block w-full pl-10 mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input'
                : 'block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow form-input';
@endphp

<div class="block text-sm space-y-1">
    <span class="text-gray-700 dark:text-gray-400">{{ $label }}</span>
    <div class="relative text-gray-500 focus-within:text-yellow-600 dark:focus-within:text-yellow-400">
        <input {{ $attributes->merge(['class' => $classes]) }} class="" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            {{ $slot }}
        </div>
    </div>
    @if ($error)
        <span class="text-xs font-semibold text-red-600 dark:text-red-400">
            {{ $error }}
        </span>
    @endif
</div>

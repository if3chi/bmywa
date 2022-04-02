@props(['label' => false, 'id' => false, 'error' => false])

@php
$classes = $error ? 'block w-full p-2 mt-1 text-sm rounded-md border-2 border-red-600 dark:text-gray-200 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red placeholder-gray-300 dark:placeholder-gray-500' : 'block w-full p-2 mt-1 text-sm rounded-md border-2 text-black dark:text-gray-200 dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow placeholder-gray-300 dark:placeholder-gray-500';
@endphp

<div class="mb-6">
    <label for="{{ $id }}" class="text-gray-700 dark:text-gray-400">{{ $label }}</label>

    <select id="{{ $id }}" {{ $attributes->merge(['class' => $classes]) }} class="">
        {{ $slot }}
    </select>

    @if ($error)
        <div class="p-0.5">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400">
                {{ $error }}
            </span>
        </div>
    @endif
</div>

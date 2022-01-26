@props(['label' => false, 'id' => false, 'error' => false])

@php
    $classes = $error 
                ? 'block w-full pl-10 mt-1 text-sm text-center border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input placeholder-gray-300 dark:placeholder-gray-500'
                : 'block w-full pl-10 mt-1 text-sm text-center text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow form-input placeholder-gray-300 dark:placeholder-gray-500';
@endphp


<div class="space-y-0.5">
    <label for="{{ $id }}" class="text-gray-700 dark:text-gray-400 text-sm">{{ $label }}</label>

    <div x-data="{ value: @entangle($attributes->wire('model'))}"
        x-init="new Pikaday({ field: $refs.birthday, format: 'yyyy', onOpen() { this.setDate($refs.birthday.value) } })"
        x-on:change="value = $event.target.value"
        class="relative">
        <span
            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-gray-700 dark:border-gray-600">
            <x-icon.calendar strokeWidth="2" class="w-5 h-5" />
        </span>

        <input {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => $classes]) }} id={{ $id }} x-ref="birthday"
            :value="value"
            placeholder="eg: {{ date('Y') }}" />

    </div>
    
    @if ($error)
        <p class="text-xs font-semibold text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div>

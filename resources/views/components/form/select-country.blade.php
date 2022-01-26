@props(['country' => false, 'label' => false, 'id' => false, 'error' => false])

@php
$country_flag = in_array($country, array_keys(entryCountry())) ? $country . '-flag.png' : 'question-mark.png';
$classes = $error 
                ? 'block w-full p-2 my-2 text-sm rounded-md border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red placeholder-gray-300 dark:placeholder-gray-500'
                : 'block w-full p-2 my-2 text-sm rounded-md text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow placeholder-gray-300 dark:placeholder-gray-500';
@endphp

<div class="flex flex-row space-x-4 h-auto">
    <div class="w-full">
        <label for="{{ $id }}"
            class="absolute -mt-5 text-gray-700 dark:text-gray-400">{{ $label }}</label>

        <select id="{{ $id }}" {{ $attributes->merge(['class' => $classes]) }} class="">
            {{ $slot }}
        </select>

        @if ($error)
            <div class="p-0.5 -my-2">
                <span class="text-xs font-semibold text-red-600 dark:text-red-400">
                    {{ $error }}
                </span>
            </div>
        @endif
    </div>

    <div class="flex p-2.5 mt-1">
        <span class="relative w-8 h-8 flex-row bg-cover rounded-full shadow-md">
            <img wire:loading.delay.class.long="opacity-25" wire:target="editing.country"
                src="{{ asset('images/flags/' . $country_flag) }}" alt="Country Flag"
                class="w-8 h-8 bg-cover rounded-full text-xs shadow-md">

            <x-icon.tail-spin wire:loading.delay.long wire:target="editing.country"
                class="absolute w-5 h-5 top-2 right-2 my-0 text-yellow-700 rounded-full" fill="currentColor"
                aria-hidden="true" />
        </span>
    </div>
</div>

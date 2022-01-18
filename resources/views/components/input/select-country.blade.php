@props(['country' => false, 'label' => false, 'id' => false, 'error' => false])

@php
$country_flag = in_array($country, array_keys(entryCountry())) ? $country . '-flag.png' : 'question-mark.png';
@endphp

<div class="flex flex-row space-x-4 h-auto">
    <p class="flex p-2.5">
        <span class="relative w-8 h-8 flex-row bg-cover rounded-full shadow-md">
            <img wire:loading.delay.class.long="opacity-25" wire:target="editing.country"
                src="{{ asset('images/flags/' . $country_flag) }}" alt="Country Flag"
                class="w-8 h-8 bg-cover rounded-full text-xs shadow-md">

            <x-icon.tail-spin wire:loading.delay.long wire:target="editing.country"
                class="absolute w-5 h-5 top-2 right-2 my-0 text-yellow-700 rounded-full" fill="currentColor"
                aria-hidden="true" />
        </span>
    </p>


    <div class="mb-4 w-full">
        <label for="{{ $id }}"
            class="absolute px-2 ml-2 -mt-1 z-10 font-normal text-gray-500 bg-white">{{ $label }}</label>

        <select id="{{ $id }}" {{ $attributes }}
            class="block w-full p-3 mt-2 mb-2 text-xs text-gray-500 bg-white border-2 tracking-wider font-light rounded-md focus:ring focus:outline-none  {{ $error ? 'border-red-100 focus:border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:border-yellow-100 focus:ring-yellow-300' }}">
            {{ $slot }}
        </select>

        @if ($error)
            <div class="p-0.5 ml-2">
                <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                    {{ $error }}
                </span>
            </div>
        @endif
    </div>
</div>

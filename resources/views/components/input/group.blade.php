@props(['label' => false, 'id' => false, 'error' => false])

<div class="relative mb-6">
    <label for="{{ $id }}"
        class="absolute px-2 ml-2 -mt-3 font-normal text-gray-500 bg-white">{{ $label }}</label>

    <input {{ $attributes }} id="{{ $id }}" wire:dirty.class="border-yellow-100 focus:ring-yellow-300"
        wire:dirty.class.remove="border-red-100 focus:ring-red-400"
        class="block w-full p-3 mt-2 text-xs placeholder-gray-400 tracking-wider font-light  bg-white border-2  rounded-md focus:ring focus:outline-none {{ $error ? 'border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:ring-yellow-300' }}">

    @if ($error)
        <div class="p-0.5 mx-2">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                {{ $error }}
            </span>
        </div>
    @endif

</div>

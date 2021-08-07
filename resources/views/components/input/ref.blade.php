@props(['label' => false, 'id' => false, 'error' => false])

<div class="w-full">
    <div class="relative">
        <label for="{{ $id }}"
            class="absolute px-2 ml-4 -mt-3 font-normal text-gray-500 bg-white">{{ $label }}</label>
        <input {{ $attributes }} id="{{ $id }}" type="text"
            class="block w-full ml-2 p-3 mt-0 text-xs placeholder-gray-400 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300">
    </div>

    @if ($error)
        <div class="p-0.5 text-right block">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                {{ $error }}
            </span>
        </div>
    @endif
</div>

@props(['label' => false, 'id' => false, 'error' => false])


<div class="mb-6">
    <label for="{{ $id }}"
        class="absolute px-2 ml-2 -mt-3 z-10 font-normal text-gray-500 bg-white">{{ $label }}</label>

    <select id="{{ $id }}" {{ $attributes }}
        class="block w-full p-3 mt-2 mb-2 text-xs text-gray-500 bg-white border-2 tracking-wider font-light rounded-md focus:ring focus:outline-none  {{ $error ? 'border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:ring-yellow-300' }}">
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

@props(['label' => false, 'id' => false, 'error' => false])

<div class="w-32 mb-10">
    <div class="relative">
        <label for="$id" class="absolute px-2 ml-2 -mt-3 font-normal text-gray-500 bg-white">{{ $label }}</label>
        <input {{ $attributes }} id="{{ $id }}" type="number"
            class="block w-full p-3 mt-0 text-xs placeholder-gray-400 tracking-wider font-light  bg-white border-2 rounded-md focus:ring focus:outline-none  {{ $error ? 'border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:ring-yellow-300' }}">
    </div>


    @if ($error)
        <div class="p-0.5 ml-1 absolute w-56">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider mt-20">
                {{ $error }}
            </span>
        </div>
    @endif
</div>

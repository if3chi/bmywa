@props(['label' => false, 'id' => false, 'error' => false])

<div class="relative mb-6">
    <label for="{{ $id }}"
        class="absolute px-2 ml-2 -mt-3 font-normal text-gray-500 bg-white">{{ $label }}</label>
    <textarea {{ $attributes }} id="{{ $id }}" wire:dirty.class="border-yellow-100 focus:ring-yellow-300"
        wire:dirty.class.remove="border-red-100 focus:ring-red-400"
        class="block w-full h-36  p-2 mt-6 text-sm text-justify  placeholder-gray-400 tracking-wider font-light  bg-white border-2 rounded-md focus:ring focus:outline-none {{ $error ? 'border-red-100 focus:border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:border-yellow-100 focus:ring-yellow-300' }}"
        placeholder="Please paste your creative writing or short story/poetry entry here. (Creative Writing: 500 words max, Short Story & Poetry: 300 words max.)"></textarea>

    @if ($error)
        <div class="p-0.5 mx-2">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                {{ $error }}
            </span>
        </div>
    @endif
</div>

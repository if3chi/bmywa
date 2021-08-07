@props(['label' => false, 'id' => false, 'error' => false])

<div class="relative mb-6">
    <label for="{{ $id }}"
        class="absolute px-2 ml-2 -mt-3 font-normal text-gray-500 bg-white">{{ $label }}</label>
    <textarea {{ $attributes }} id="{{ $id }}"
        class="block w-full h-36  p-2 mt-6 text-sm text-justify  placeholder-gray-400 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
        placeholder="Please paste your creative writing or short story/poetry entry here. (Creative Writing: 500 words max, Short Story & Poetry: 300 words max.)"></textarea>

    @if ($error)
        <div class="p-0.5 ml-8">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                {{ $error }}
            </span>
        </div>
    @endif
</div>

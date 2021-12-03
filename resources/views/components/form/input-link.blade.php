@props(['label', 'error' => false])

<div class="w-full space-y-1 mb-2">
    <span class="text-gray-700 dark:text-gray-400 mt-4 text-sm">{{ $slot }}</span>
    <div class="flex flex-wrap items-stretch w-full relative">
        <div class="flex -mr-px text-gray-500">
            <span
                class="flex items-center leading-normal rounded rounded-r-none border border-r-0 dark:border-gray-600 px-3 whitespace-no-wrap text-sm">{{ $label }}</span>
        </div>
        <input type="text" {{ $attributes }}
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 text-black dark:text-gray-300 placeholder-gray-300 dark:placeholder-gray-500 border dark:border-gray-600 dark:bg-gray-700 h-10 rounded rounded-l-none px-2 relative focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow">
    </div>
    @if ($error)
        <span class="text-xs font-semibold text-red-600 dark:text-red-400">
            {{ $error }}
        </span>
    @endif
</div>

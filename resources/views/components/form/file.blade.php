@props(['label', 'error' => false, 'target' => false])
 
<div class="block items-center">
    <div x-data="{ focused: false }" class="text-sm flex items-center justify-evenly">
        <input {{ $attributes }} @focus="focused = true" @blur="focused = false" class="sr-only" id="file" />
        <label for="file" :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }"
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
            <span>{{ $label }}</span> 
            <x-icon.three-dots wire:loading wire:target="{{ $target }}" class="w-5 h-5 ml-2 -mr-1" fill="currentColor"
            aria-hidden="true" />
        </label>
        <div class=" items-center text-sm">
            <div class="w-32 h-32 mr-4 rounded-md md:block">
                {{ $slot }}
            </div>
        </div>
    
    </div>
    @if ($error)
        <span class="text-xs font-semibold text-red-600 dark:text-red-400">
            {{ $error }}
        </span>
    @endif
</div>


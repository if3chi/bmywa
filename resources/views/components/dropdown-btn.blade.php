@props(['label'])

<div @click.away="open = false" class="relative" x-data="{ open: false }">
    <button @click="open = !open" {!! $attributes->merge(['class' => 'flex items-center cursor-pointer justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow space-x-2']) !!}>
        <span>{{ $label }}</span>
        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
            class="inline w-6 h-6 transition-transform duration-200 transform">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute left-0 mt-2 origin-top-left rounded-md shadow-lg">
        <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-800 max-w-max space-y-1">
            {{ $slot }}
        </div>
    </div>
</div>

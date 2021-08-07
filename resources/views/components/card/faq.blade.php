@props(['qtn', 'ans'])

<div x-data="{ show: false }" x-on:mouseleave=" setTimeout(() => show = false, 5000) "
    class="relative overflow-hidden border-2 border-white shadow-lg rounded-lg select-none hover:bg-white">
    <h4 @click="show=!show"
        class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
        <span>{{ $qtn }}</span>
        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0 text-yellow-500"
            :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
            </path>
        </svg>
    </h4>
    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform -translate-y-0"
        x-transition:leave="transition-all ease-out hidden duration-200"
        x-transition:leave-start="opacity-100 transform -translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">{{ $ans }}</p>
</div>

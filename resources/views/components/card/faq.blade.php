<div x-data="{ show: false }"
    class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
    <h4 @click="show=!show"
        class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
        <span>How can I enter the competition?</span>
        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
    </h4>
    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform -translate-y-0"
        x-transition:leave="transition-all ease-out hidden duration-200"
        x-transition:leave-start="opacity-100 transform -translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">Pick up an
        entry forms from participating schools or enter online. Alternatively submit by email to
        info@bmywa.com or request a copy of the entry form.</p>
</div>

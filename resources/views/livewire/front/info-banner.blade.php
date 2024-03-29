<div class="bg-gray-100">
    <div x-data="{ open: true }" x-show.transition.duration.300ms="open" class="w-full overflow-hidden z-150 fade-in"
        x-cloak>
        {{-- <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8"> --}}
        <div
            class="px-2 py-1 md:px-3 bg-gradient-to-r from-yellow-500 via-pink-500 to-red-500 hover:from-pink-500 hover:via-red-500 hover:to-yellow-500">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center flex-1 w-0">
                    <span class="flex p-2 bg-yellow-800 rounded-lg">
                        <!-- Heroicon name: outline/speakerphone -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span>
                    <p class="ml-3 font-medium text-white truncate">
                        <span class="md:hidden">Blooming Minds Young Writers Award 2022 </span>
                        <span class="hidden md:inline">Blooming Minds Young Writers Award, April 24th,
                            Lagos, Nigeria
                            and April 30th, Accra, Ghana. </span>
                    </p>
                </div>
                <div class="flex-shrink-0 order-3 w-full mt-2 sm:order-2 sm:mt-0 sm:w-auto">
                    <a href="{{ route('events') }}" @click="open = false"
                        class="flex items-center justify-center px-4 py-2 text-sm font-semibold text-yellow-600 bg-white border border-transparent rounded-md shadow-sm hover:bg-yellow-50">
                        Get Tickets </a>
                </div>
                <div class="flex-shrink-0 order-2 sm:order-3 sm:ml-2">
                    <button type="button" @click="open = false"
                        class="flex p-2 -mr-1 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</div>

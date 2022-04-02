@props(['imgLink' => asset('images/flyer-gh.jpeg'), 'country' => 'Ghana', 'month' => 'Apr', 'day' => 30, 'location' => 'Dubois Center, Cantonments, Accra.', 'link' => '#'])
<div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
    <div class="flex-shrink-0">
        <img class="object-cover w-full h-56" src="{{ $imgLink }}" alt="event flyer">
    </div>
    <div class="flex flex-col justify-between flex-1 p-6 bg-white">
        <div class="flex-1 space-y-6">
            <div class="flex justify-between text-sm font-medium text-yellow-500">
                <a href="{{ $link }}" class="font-semibold hover:underline"> {{ $country }} </a>
                <div class="flex items-center space-x-2 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <div class="font-semibold">
                        <span>{{ $month }}</span>
                        <span class="text-sm font-light">{{ $day }}</span>
                    </div>
                </div>
            </div>
            <a href="{{ $link }}" class="block mt-2 space-y-4">
                <p class="text-xl font-semibold text-gray-800">{{ $slot }}</p>
                <p class="flex items-center space-x-2 text-base tracking-wider text-gray-500">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </span>
                    <span class="text-sm">{{ $location }}</span>
                </p>
            </a>
        </div>
        <div class="flex items-center justify-center min-w-full pt-1 mt-2">
            <a href="{{ $link }}"
                class="w-full inline-block px-6 py-2.5 bg-gradient-to-r from-yellow-500 to-red-500 hover:from-pink-500 hover:via-red-500 hover:to-yellow-500 sm:p-3 text-white text-center font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out">Buy
                Ticket</a>
        </div>
    </div>
</div>

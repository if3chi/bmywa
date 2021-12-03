@props(['imagelink' => false, 'name' => false, 'work' => false, 'desc' => false, 'socials' => []])

<div class="w-full border bg-white border-gray-200 rounded-lg shadow-md relative pb-8">

    <div class="flex flex-col items-center justify-center p-3">
        <img class="w-48 h-48 mb-2 zoom rounded-full" src="{{ $imagelink }}" alt="{{ $name }}'s photo">
        <h2 class="text-md text-yellow-500 font-bold">{{ $name }}</h2>
        <p class="text-xs text-gray-700 font-bold {{ $work ? 'm-1' : 'm-3' }}">{{ $work }}</p>
        <p class="font-medium text-gray-500 line-clamp-3">{{ $desc }}</p>
    </div>


    @if ($socials)
        <div class="flex border-t border-gray-200 divide-x divide-gray-200 absolute bottom-0 w-full">
            @if (array_key_exists('twitter', $socials))
                <a href="{{ $socials['twitter'] }}" target="_blank"
                    class="flex-1 block p-2 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-blue-500">
                    <x-icon.twitter class="mx-auto w-6 h-6" />
                </a>
            @endif

            @if (array_key_exists('facebook', $socials))
                <a href="{{ $socials['facebook'] }}" target="_blank"
                    class="flex-1 block p-2 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-blue-800">
                    <x-icon.facebook-circle class="mx-auto" />
                </a>
            @endif

            @if (array_key_exists('instagram', $socials))
                <a href="{{ $socials['instagram'] }}" target="_blank"
                    class="flex-1 block p-2 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-pink-600">
                    <x-icon.instagram class="mx-auto" strokeWidth="2" />
                </a>
            @endif
            @if (array_key_exists('linkedin', $socials))
                <a href="{{ $socials['linkedin'] }}" target="_blank"
                    class="flex-1 block p-2 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-blue-900">
                    <x-icon.linkedin class="mx-auto fill-current mt-0.5" />
                </a>
            @endif
        </div>
    @else
        <div class="flex border-t border-gray-200 divide-x divide-gray-200 absolute bottom-0 w-full p-1.5">
            <p class="text-center mx-auto text-xl font-semibold text-gray-200">BMYWA</p>
        </div>
    @endif

</div>

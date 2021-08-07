@props(['country' => false])

<p class="flex w-full mt-4 space-x-2 text-sm justify-center text-center text-gray-500">
    <span class="text-center pt-1">
        Wrong Country?
    </span>
    <span class="w-8 h-8 flex-row bg-cover rounded-full shadow-md">
        <img src="{{ asset('images/flags/' . $country . '-flag.png') }}" alt="Country Flag"
            class="w-8 h-8 bg-cover rounded-full text-xs shadow-md">
    </span>
    <a {{ $attributes }} href="" class="text-yellow-500 underline  pt-1">Click here</a>
</p>

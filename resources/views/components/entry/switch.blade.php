@props(['country' => false, 'target' => false])

<p class="flex w-full mt-4 space-x-2 text-sm justify-center text-center text-gray-500">
    <span class="text-center pt-1 font-semibold">
        Wrong Country?
    </span>
    <span class="relative w-8 h-8 flex-row bg-cover rounded-full shadow-md">
        <img wire:loading.delay.class.long="opacity-25" wire:target="{{ $target }}"  src="{{ asset('images/flags/' . $country . '-flag.png') }}" alt="Country Flag"
            class="w-8 h-8 bg-cover rounded-full text-xs shadow-md">

            <x-icon.tail-spin wire:loading.delay.long wire:target="{{ $target }}"  class="absolute w-5 h-5 top-2 right-2 my-0 text-yellow-700 rounded-full"
                fill="currentColor" aria-hidden="true" />
    </span>
    <a {{ $attributes }} href="" class="text-yellow-500 underline  pt-1">Click here</a>
</p>

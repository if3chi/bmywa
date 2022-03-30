<button {{ $attributes }} type="button"
    class="flex items-center justify-between px-4 py-2 mx-auto space-x-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg cursor-pointer text-md active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
    <x-icon.check-circle class="w-6 h-6 text-white" />
    <span>{{ $slot }}</span>
</button>

<button {{ $attributes->merge([ 'class'=> "w-full px-3 py-4 mt-4 font-medium text-white bg-yellow-300 rounded-lg focus:ring focus:outline-none focus:ring-yellow-300"]) }}>
    {{ $slot }}
</button>

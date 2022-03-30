<div>
    <x-front.gallery-tab />
    <div class="container px-5 py-2 mx-auto mb-10 lg:pt-12 lg:px-32">
        <div class="flex flex-wrap -m-1 md:-m-2">
            @forelse ($photos as $photo)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ $photo->url }}">
                    </div>
                </div>
            @empty
                <div class="flex flex-wrap w-full">
                    <div class="w-full p-1 text-center md:p-2">
                        <h1 class="text-xl font-bold text-center text-gray-900 md:text-3xl">
                            Uh-Oh... Seems we don't have any media here yet.
                        </h1>
                    </div>
                </div>
            @endforelse
        </div>
        {{-- #TODO: use load more --}}
        {{-- {{ $photos->links() }} --}}
    </div>
    <x-front.gallery-tab />
</div>

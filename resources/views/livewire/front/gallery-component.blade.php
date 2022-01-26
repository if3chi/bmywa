<div>
    <div
        class="flex items-center -mx-4 overflow-x-auto overflow-y-hidden sm:justify-center flex-nowrap dark:bg-gray-800 dark:text-gray-100">
        <a href="#" wire:click.prevent="selectTab('all')"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab('all') ? 'border border-b-0 rounded-t-lg' : 'border-b' }} dark:border-coolGray-400 dark:text-coolGray-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>All {{ count(getAlbums()) }}</span>
        </a>
        @foreach (getAlbums() as $id => $data)
            <a href="#" wire:click.prevent="selectTab({{ $id }})"
                class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab($id) ? 'border border-b-0 rounded-t-lg' : 'border-b' }} dark:border-gray-400 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>{{ $data[1] }}</span>
            </a>
        @endforeach
    </div>
    {{-- <div class="container px-5 py-2 mx-auto lg:pt-24 lg:px-32">
        <div class="flex flex-wrap -m-1 md:-m-2">
            <div class="flex flex-wrap w-1/2">
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">
                </div>
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/2">
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp">
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32 mb-10">
        <div class="flex flex-wrap -m-1 md:-m-2">
            @foreach ($photos as $photo)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ $photo->url }}">
                    </div>
                </div>
            @endforeach
        </div>
        {{-- #TODO: use load more --}}
        {{-- {{ $photos->links() }} --}}
    </div>
    <div
        class="flex items-center -mx-4 overflow-x-auto overflow-y-hidden sm:justify-center flex-nowrap dark:bg-gray-800 dark:text-gray-100">
        <a href="#" wire:click.prevent="selectTab('all')"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab('all') ? 'border border-b-0 rounded-t-lg' : 'border-b' }} dark:border-coolGray-400 dark:text-coolGray-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>All {{ count(getAlbums()) }}</span>
        </a>
        @foreach (getAlbums() as $id => $data)
            <a href="#" wire:click.prevent="selectTab({{ $id }})"
                class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab($id) ? 'border border-b-0 rounded-t-lg' : 'border-b' }} dark:border-gray-400 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>{{ $data[1] }}</span>
            </a>
        @endforeach
    </div>
</div>

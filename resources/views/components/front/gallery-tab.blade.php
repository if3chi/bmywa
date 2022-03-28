<div class="flex items-center -mx-4 overflow-x-auto overflow-y-hidden sm:justify-center flex-nowrap">
    <a href="#" wire:click.prevent="selectTab('{{ \App\Utilities\Constant::ALL }}')"
        class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab(\App\Utilities\Constant::ALL) ? 'border border-b-0 rounded-t-lg' : 'border-b' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
        </svg>
        <span>All {{ count(getAlbumList($filterOn = true)) }}</span>
    </a>

    @foreach (getAlbumList($filterOn = true) as $album)
        <a href="#" wire:click.prevent="selectTab({{ $album->id }})"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ $this->isActiveTab($album->id) ? 'border border-b-0 rounded-t-lg' : 'border-b' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>{{ $album->year }}</span>
        </a>
    @endforeach
</div>

<?php

namespace App\Http\Livewire\Front;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;
use App\Utilities\Constant;

class GalleryComponent extends Component
{

    private $activeTab;

    public function mount()
    {
        $this->activeTab = Album::select('id', 'year')->orderBy('year', 'desc')->value('id');
    }

    public function isActiveTab($tab)
    {
        return $this->activeTab === $tab;
    }

    public function selectTab($id)
    {
        $this->activeTab = $id;
    }

    public function loadPhotos()
    {
        $cache_untill = now()->endOfMonth()->subSecond();

        $allPhotos = cache()->remember(Constant::ALL_PHOTO, $cache_untill, function () {
            return Photo::inRandomOrder()->paginate(20);
        });

        $album = cache()->remember(Constant::album_cache_key($this->activeTab), $cache_untill, function () {
            return Photo::whereRelation('Album', 'id', $this->activeTab)->inRandomOrder()->paginate(20);
        });
        return $this->activeTab === Constant::ALL ? $allPhotos : $album;
    }

    public function render()
    {
        return view('livewire.front.gallery-component', [
            'photos' => $this->loadPhotos()
        ])
            ->layout('layouts.front');
    }
}

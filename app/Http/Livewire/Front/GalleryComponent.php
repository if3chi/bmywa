<?php

namespace App\Http\Livewire\Front;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;

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
        $allPhotos = Photo::paginate(20);
        return $this->activeTab === 'all' ? $allPhotos : Photo::whereRelation('Album', 'id', $this->activeTab)->paginate(2);
    }

    public function render()
    {
        return view('livewire.front.gallery-component', [
            'photos' => $this->loadPhotos()
        ])
            ->layout('layouts.front');
    }
}

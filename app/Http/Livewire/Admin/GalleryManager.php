<?php

namespace App\Http\Livewire\Admin;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\WithUtilities;

class GalleryManager extends Component
{
    use WithPagination, WithFileUploads, WithUtilities;
    public $mode;
    public $country;
    public $images = [];
    public $editAlbumYear;
    public Album $editingAlbum;
    public Photo $editingPhoto;

    protected function rules()
    {
        $albumRules = [
            'editingAlbum.name' => 'required|string|max:140',
            'editingAlbum.description' => 'nullable|string|max:255',
            'editingAlbum.year' => [
                'required', 'max:4',
                Rule::unique('albums', 'year')
                    ->ignore($this->editingAlbum->id)
            ],
        ];

        $photoRules =  [
            'editingPhoto.album_id' => 'required|exists:albums,id',
            'editingPhoto.country' => ['required', Rule::in(array_keys(entryCountry()))],
            'images.*' => 'required|image|mimes:png,jpg,jpeg,webp,gif|max:12000'
        ];

        return $this->checkMode() ? $albumRules : $photoRules;
    }

    protected $validationAttributes = [
        'album_id' => 'Album',
        'country' => 'Country',
    ];

    public function mount()
    {
        $this->editingAlbum = $this->makeBlankAlbum();
        $this->editingPhoto = $this->makeBlankPhoto();
    }

    public function getForm($mode, $type, $model = null)
    {
        $this->mode = $mode;
        $this->resetValidation();
        $this->reset('images');

        if ($mode == 'album') {
            if ($type == 'edit') {
                $this->editingAlbum = Album::findOrFail($model);
                $this->editAlbumYear = $this->editingAlbum->year;
                $this->formTitle = "Edit Album {$this->editingAlbum->name}";
            } else {
                $this->editingAlbum = $this->makeBlankAlbum();
                $this->formTitle = 'Create New Album';
            }
        }

        if ($mode == 'photos') {
            $this->editingPhoto = $this->makeBlankPhoto();
            // dd(getAlbums());
            $this->formTitle = 'Add New Photo(s)';
        }

        $this->openModal('form');
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->checkMode()) {
            DB::transaction(function () use ($validatedData) {
                $oldAlbumYear = $this->editAlbumYear;
                $album = $this->editingAlbum->updateOrCreate(
                    ['id' => $this->editingAlbum->id],
                    $validatedData['editingAlbum']
                );

                if (str_contains($this->formTitle, 'Edit Album') && $oldAlbumYear !== $album->year) {
                    rename(
                        Storage::disk('gallery')->path($oldAlbumYear),
                        Storage::disk('gallery')->path($album->year)
                    );
                }
            });


            $this->notify([
                'title' => str_contains($this->formTitle, 'Edit')
                    ? 'Album Updated Successfully'
                    : 'Album Created Successfully',
                'body' => $this->editingAlbum->name
            ]);
        }

        if (!$this->checkMode()) {

            // dd($validatedData);

            $albumYear = Album::select('year')->where('id', $validatedData['editingPhoto']['album_id'])->value('year');

            // dd($albumYear);

            foreach ($this->images as $image) {

                $imageName = $this->processImage('', $image,  1080, 1080, 'gallery', $albumYear);

                $this->editingPhoto->updateOrCreate(
                    ['id' => $this->editingPhoto->id],
                    [
                        "album_id" => $validatedData['editingPhoto']['album_id'],
                        "country" => $validatedData['editingPhoto']['country'],
                        "image" => $imageName
                    ]
                );
            }

            $this->notify([
                'title' => str_contains($this->formTitle, 'Edit')
                    ? 'Photo(s) Updated Successfully'
                    : 'Photo(s) Created Successfully',
                // 'body' => $this->editingAlbum->name
            ]);
        }

        $this->hideModal('form');
    }

    public function confirmDelete($judge)
    {
        $this->getDelModal("Delete Judge's Data", $judge);
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager', [
            'albums' => Album::withCount('Photos')->latest()->paginate(3),
            'photos' => Photo::with('Album')->paginate(5),
        ])
            ->layout('layouts.admin');
    }

    public function makeBlankAlbum()
    {
        return Album::make();
    }

    public function makeBlankPhoto()
    {
        return Photo::make(['album_id' => '', 'country' => '']);
    }

    public function checkMode()
    {
        return $this->mode === 'album';
    }
}

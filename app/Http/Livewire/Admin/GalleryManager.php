<?php

namespace App\Http\Livewire\Admin;

use App\Utilities\Constant;
use App\Models\{Album, Photo};
use Illuminate\Validation\Rule;
use App\Http\Livewire\Traits\WithUtilities;
use Illuminate\Support\Facades\{DB, Storage};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\{Component, WithFileUploads, WithPagination};

class GalleryManager extends Component
{
    use AuthorizesRequests, WithPagination, WithFileUploads, WithUtilities;

    public Album $editingAlbum;
    public Photo $editingPhoto;
    public $diskName = 'gallery', $images = [];
    public $mode, $country, $editAlbumYear, $selectedRecord;

    protected function rules(): array
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

    public function mount(): void
    {
        $this->editingAlbum = $this->makeBlankAlbum();
        $this->editingPhoto = $this->makeBlankPhoto();
    }

    public function getForm($mode, $type, $model = null): void
    {
        $this->mode = $mode;
        $this->resetValidation();
        $this->reset('images');

        if ($mode == Constant::ALBUM) {
            if ($type == Constant::EDIT) {
                $this->editingAlbum = Album::findOrFail($model);
                $this->editAlbumYear = $this->editingAlbum->year;
                $this->formTitle = "Edit Album {$this->editingAlbum->name}";
            } else {
                $this->editingAlbum = $this->makeBlankAlbum();
                $this->formTitle = 'Create New Album';
            }
        }

        if ($mode == Constant::PHOTOS) {
            $this->editingPhoto = $this->makeBlankPhoto();
            $this->formTitle = 'Add New Photo(s)';
        }

        $this->openModal('form');
    }

    public function save(): void
    {
        $validatedData = $this->validate();

        if ($this->checkMode()) {
            DB::transaction(function () use ($validatedData) {
                $oldAlbumYear = $this->editAlbumYear;
                $album = $this->editingAlbum->updateOrCreate(
                    ['id' => $this->editingAlbum->id],
                    $validatedData['editingAlbum']
                );

                $oldFolder = Storage::disk($this->diskName)->path($oldAlbumYear);

                if (
                    str_contains($this->formTitle, 'Edit Album')
                    && $oldAlbumYear !== $album->year
                    && file_exists($oldFolder)
                ) {
                    rename($oldFolder, Storage::disk($this->diskName)->path($album->year));
                    $this->clearPhotosCache($album->id);
                }
            });


            $this->notify([
                'title' => str_contains($this->formTitle, Constant::EDIT)
                    ? 'Album Updated Successfully'
                    : 'Album Created Successfully',
                'body' => $this->editingAlbum->name
            ]);
        }

        if (!$this->checkMode()) {

            $validatedData = $validatedData['editingPhoto'];
            $saveFolder = Album::where('id', $validatedData['album_id'])->value('year');

            foreach ($this->images as $image) {

                $imageName = $this->processImage(
                    null,
                    $image,
                    1080,
                    1080,
                    $this->diskName,
                    $saveFolder
                );

                $this->editingPhoto->updateOrCreate(
                    ['id' => $this->editingPhoto->id],
                    [
                        "album_id" => $validatedData['album_id'],
                        "country" => $validatedData['country'],
                        "image" => $imageName
                    ]
                );
            }

            $cacheKey = Constant::album_cache_key($validatedData['album_id']);
            clear_cache(Constant::ALL_PHOTO);
            if (cache()->has($cacheKey)) clear_cache($cacheKey);

            $this->notify([
                'title' => str_contains($this->formTitle, Constant::EDIT)
                    ? 'Photo(s) Updated Successfully'
                    : 'Photo(s) Created Successfully'
            ]);
        }

        $this->hideModal('form');
    }

    // TODO: Implement deleting album
    public function confirmDelete(string $mode, $model): void
    {
        $record = '';
        $this->mode = $mode;
        if ($this->checkMode()) {
            $record = Album::findOrFail($model);
        }
        if (!$this->checkMode()) {
            $record = Photo::findOrFail($model);
        }
        $this->getDelModal(ucwords("Delete $mode"), $record);
    }

    public function destroy(): void
    {
        $record = $this->selectedRecord;

        if ($this->checkMode()) {
            DB::transaction(function () use ($record) {
                Photo::destroy($record->photos);
                $record->delete();
                Storage::disk($this->diskName)->deleteDirectory($record->year);
                $this->clearPhotosCache($record->id);

                $this->notify([
                    'title' => 'Deleted Successfully',
                    'body' => "{$record->name} and all it's photos.."
                ]);
            });
        }

        if (!$this->checkMode()) {
            $this->delPhoto("{$record->album->year}/{$record->image}", $this->diskName);
            $record->delete();
            $this->clearPhotosCache($record->album_id);
            $this->notify([
                'title' => 'Deleted Successfully',
            ]);
        }

        $this->hideModal('del');
    }

    private function clearPhotosCache(int $id): void
    {
        clear_cache(Constant::album_cache_key($id), Constant::ALL_PHOTO);
    }

    public function render()
    {
        $this->authorize(Constant::MANAGE_SITE);

        return view('livewire.admin.gallery-manager', [
            'albums' => Album::withCount('Photos')->orderBy('year', 'desc')->paginate(3),
            'photos' => Photo::with('Album')->latest()->paginate(5),
        ])
            ->layout('layouts.admin');
    }

    public function makeBlankAlbum(): Album
    {
        return Album::make();
    }

    public function makeBlankPhoto(): Photo
    {
        return Photo::make(['album_id' => '', 'country' => '']);
    }

    public function checkMode(): bool
    {
        return $this->mode === Constant::ALBUM;
    }
}

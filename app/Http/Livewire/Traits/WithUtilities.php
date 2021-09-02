<?php

namespace App\Http\Livewire\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait WithUtilities
{

    public $formTitle = '';
    public bool $showEditModal = false;
    public bool $showDelModal = false;

    public function hideModal(String $type)
    {
        if ($type === 'del') {
            $this->showDelModal = false;
        }

        if ($type === 'form') {
            $this->showEditModal = false;
        }
    }

    public function openModal(String $type)
    {
        if ($type === 'del') {
            $this->showDelModal = true;
        }

        if ($type === 'form') {
            $this->showEditModal = true;
        }
    }


    public function processImage(
        $oldImage,
        $imageFile,
        String $diskName,
        int $width,
        int $height
    ): String {

        $imageName = $oldImage;

        if ($imageFile) {

            $ext = 'png';

            $this->delPhoto($oldImage, $diskName);

            $imageFile = (string) Image::make($imageFile)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($ext, 95);

            $imageName = md5($imageFile).".$ext";

            Storage::disk($diskName)->put("/$imageName", $imageFile);

        }

        return $imageName;
    }

    public function getDelModal($formTitle, $record)
    {
        $this->formTitle = $formTitle;
        $this->selectedRecord = $record;
        $this->openModal('del');
    }

    public function deleteRecord($imageName)
    {
        $this->delPhoto($imageName, $this->diskName);
        $this->selectedRecord->delete();
        $this->notify([
            'title' => 'Deleted Successfully',
            'body' => $this->selectedRecord->name
        ]);

        // TODO: Fix Reset page if last item on page
        // if ($this->page > 1 && $this->paginator->firstItem() == 0) {
        //     dd('working');
        // }

        $this->hideModal('del');
    }

    public function delPhoto($filename, $diskName)
    {
        if ($filename) Storage::disk($diskName)->delete($filename);
    }
}

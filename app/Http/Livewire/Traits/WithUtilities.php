<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Storage;

trait WithUtilities
{

    public function delPhoto($filename, $diskName)
    {
        if ($filename) Storage::disk($diskName)->delete($filename);
    }
}

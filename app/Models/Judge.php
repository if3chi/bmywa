<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Judge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? Storage::disk('judge')->url($this->avatar)
            : '';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'image', 'country', 'featured'];

    public function Album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function getUrlAttribute()
    {
        return Storage::disk('gallery')->url("{$this->album->year}/{$this->image}");
    }
}

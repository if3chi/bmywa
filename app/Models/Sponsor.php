<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo'];

    public function getAltTextAttribute()
    {
        return $this->name . " Logo";
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? Storage::disk('sponsor')->url($this->logo)
            : '';
    }
}

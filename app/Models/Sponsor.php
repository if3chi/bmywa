<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sponsor extends Model
{
    use HasFactory;

    // Has Observer

    protected $fillable = ['name', 'logo', 'web_address'];

    public function getAltTextAttribute()
    {
        return $this->name . " Logo";
    }

    public function getWebsiteAttribute()
    {
        $url = $this->web_address;

        return $url ? "https://{$url}" : "";
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? Storage::disk('sponsor')->url($this->logo)
            : '';
    }
}

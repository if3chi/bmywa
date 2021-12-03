<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Judge extends Model
{
    use HasFactory;

    // Has Observer

    protected $fillable = [
        'name',
        'avatar',
        'profession',
        'description',
        'socials'
    ];

    public function getSocialLinksAttribute()
    {
        $usernames = collect(json_decode($this->socials))->all();

        return loadSocialLinks($usernames);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? Storage::disk('judge')->url($this->avatar)
            : '';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'email',
        'phone', 'entry_fee', 'age',
        'entry_type', 'award_entry', 'country'
    ];

    public function getContestantNameAttribute()
    {
        return "$this->lastname $this->firstname";
    }

    public function getDateSubmittedAttribute()
    {
        return $this->created_at->toDisplayFormat();
    }

    public function getSubmissionCountryAttribute()
    {
        $countries = [
            'gh' => 'Ghana',
            'ng' => 'Nigeria',
        ];

        return $countries[$this->country];
    }

    public function getCountryColorAttribute()
    {
        return $this->country === 'ng'
            ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100'
            : 'text-yellow-700 bg-yellow-100 dark:bg-yellow-700 dark:text-yellow-100';
    }

    public function getCategoryAttribute()
    {
        $categories = [
            'creative-writing' => 'Creative Writing',
            'short-story' => 'Short Story / Poetry'
        ];

        return $categories[$this->entry_type];
    }
}

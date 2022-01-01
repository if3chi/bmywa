<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname', 'lastname', 'email',
        'phone', 'entry_fee', 'age',
        'entry_type', 'title', 'award_entry', 'country'
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
        return entryCountry()[$this->country];
    }

    public function getCountryColorAttribute()
    {
        return $this->country === 'ng'
            ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100'
            : 'text-yellow-700 bg-yellow-100 dark:bg-yellow-700 dark:text-yellow-100';
    }

    public function getCategoryAttribute()
    {
        return entryCategories()[$this->entry_type][0];
    }

    public function getTruncatedAttribute()
    {
        return substr($this->award_entry, 0, 96);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
}

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
}

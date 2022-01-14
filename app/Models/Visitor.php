<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Visitor extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $casts = [
        'visit_date' => 'date:Y-m-d',
    ];

    protected $fillable = [
        'visitor_ip', 'visitor_browser', 'visitor_platform', 'visitor_device', 'visit_time', 'visit_date'
    ];

    public function getVisitDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}

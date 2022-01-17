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
        'ip', 'browser', 'platform', 'device', 'visit_time',
        'visit_date', 'country_code', 'city_name', 'region_name', 'country_name',
    ];

    public function getVisitDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}

<?php

use App\Models\Faq;
use Carbon\Carbon;

if (!function_exists('loadFaqs')) {

    function loadFaqs()
    {
        return Faq::all();
    }
}

if (!function_exists('entryCategories')) {

    function entryCategories(): array
    {
        return [
            'creative-writing' => ['Creative Writing', 10, 13, 500],
            'essay-writing' => ['Essay Writing', 14, 15, 600],
            'short-story' => ['Short Story / Poetry', 6, 9, 300]
        ];
    }
}

if (!function_exists('entryCountry')) {

    function entryCountry()
    {
        return [
            'gh' => 'Ghana',
            'ng' => 'Nigeria'
        ];
    }
}

if (!function_exists('entrySchedule')) {

    function formatDate($date)
    {
        return Carbon::parse($date)->format('D, M d, Y');
    }

    // TODO: Implement entry form auto enable within valid entry dates.

    function entrySchedule($key): string
    {
        return [
            'entryYear' => '2022',
            'openDate' => formatDate('11/01/2021'),
            'closeDate' => formatDate('01/22/2022'),
            'shortlistDate' => formatDate('04/15/2022'),
            'awardDate' => formatDate('04/30/2022'),
        ][$key];
    }
}

if (!function_exists('textNl2br')) {

    function textNl2br($text)
    {
        return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    }
}

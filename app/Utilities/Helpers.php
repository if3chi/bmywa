<?php

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Judge;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Cache;

if (!function_exists('loadSocialLinks')) {

    function loadSocialLinks(array $usernames): array
    {
        $profile_links = [];

        $urls = [
            'twitter' => 'https://twitter.com/',
            'linkedin' => 'https://linkedin.com/',
            'facebook' => 'https://facebook.com/',
            'instagram' => 'https://instagram.com/',
        ];

        foreach ($usernames as $key => $value) {
            if ($value !== null && $value !== "") {
                $profile_links[$key] = "$urls[$key]$value";
            }
        }

        return $profile_links;
    }
}

if (!function_exists('loadFaqs')) {

    function loadFaqs()
    {
        return Cache::rememberForever('faqs', function () {
            return Faq::select('question', 'answer')->get();
        });
    }
}

if (!function_exists('loadJudges')) {

    function loadJudges()
    {
        return Cache::rememberForever('judges', function () {
            return Judge::select('name', 'avatar', 'profession', 'description', 'socials')
                ->get();
        });
    }
}

if (!function_exists('loadSponsors')) {

    function loadSponsors()
    {
        return Cache::rememberForever('sponsors', function () {
            return Sponsor::select('name', 'logo', 'web_address')
                ->where('status', 1)
                ->get();
        });
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

    function entryCountry(): array
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

    function entrySchedule($key): string
    {
        return [
            'entryYear' => '2022',
            'openDate' => formatDate('11/01/2021'),
            'closeDate' => formatDate('01/22/2022'),
            'shortlistDate' => formatDate('03/18/2022'),
            'awardDate' => formatDate('04/30/2022'),
        ][$key];
    }

    function entryIsActive()
    {
        return Carbon::parse(entrySchedule('openDate'))->lessThanOrEqualTo(now()) &&
            Carbon::parse(entrySchedule('closeDate'))->addDay(1)->greaterThanOrEqualTo(now());
    }
}

if (!function_exists('textNl2br')) {

    function textNl2br($text): string
    {
        return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    }
}

<?php

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Album;
use App\Models\Judge;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Cache;

if (!function_exists('readingTime')) {
    function readingTime(string $words = '', int $wpm = 130)
    {
        $wordsCount = str_word_count($words);

        $readTime = null;

        if ($wordsCount > 10) {
            $readTime = explode('.', (string) $wordsCount / $wpm);

            $hr = $readTime[0];
            $sec = 0;

            if (count($readTime)  > 1) {
                $secs = (int) $readTime[1] * 60;
                $secsLen = strlen((string)$secs);

                $setPow = $secsLen > 3 ? $secsLen - 2 : $secsLen - 1;

                $sec = ceil($secs / pow(10, $setPow));
            }

            $readTime = $sec ? "{$hr}m {$sec}s read" : "{$hr}m read";
        }

        return $readTime;
    }
}

if (!function_exists('getAdminEmails')) {

    function getAdminEmails()
    {
        return [
            'Jaspar' => 'j.cyxtus@gmail.com',
            'Thelma' => 'thelmaofosuasamoah@gmail.com',
        ];
    }
}

if (!function_exists('loadSocialLinks')) {

    function loadSocialLinks(array $usernames): array
    {
        $profile_links = [];

        $urls = [
            'twitter' => 'https://twitter.com/',
            'linkedin' => 'https://www.linkedin.com/in/',
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

if (!function_exists('getAlbums')) {

    function getAlbums()
    {

        return Cache::rememberForever('albums', function () {
            return Album::select('id', 'name', 'year')
                ->orderBy('year', 'desc')
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
            'xCloseDate' => formatDate('02/15/2022'),
            'shortlistDate' => formatDate('03/18/2022'),
            'awardDate' => formatDate('04/30/2022'),
        ][$key];
    }

    function closeDateIsExtended(): bool
    {
        $newDeadLine = entrySchedule('xCloseDate');

        return $newDeadLine !== null && $newDeadLine !== '';
    }

    function entryIsActive()
    {
        $deadline = closeDateIsExtended() ? 'xCloseDate' : 'closeDate';

        return Carbon::parse(entrySchedule('openDate'))->lessThanOrEqualTo(now()) &&
            Carbon::parse(entrySchedule($deadline))->addDay(1)->greaterThanOrEqualTo(now());
    }
}

if (!function_exists('siteLogo')) {

    function siteLogo(string $type = 'tp'): string
    {
        $logo = [
            'tp' => 'logo.png',
            'withBg' => 'logo.jpg'
        ][$type];

        return asset("images/{$logo}");
    }
}

if (!function_exists('textNl2br')) {

    function textNl2br($text): string
    {
        return trim(strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />')), '<br />');
    }
}

if (!function_exists('getFormattedUrl')) {
    function getFormattedUrl(string $name = '')
    {
        return str_replace(
            env('APP_ENV') !== 'local' ? "https://" : "http://",
            "",
            $name ? route($name) : url($name)
        );
    }
}

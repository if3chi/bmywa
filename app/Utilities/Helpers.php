<?php

use App\Models\Faq;

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

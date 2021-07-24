<?php

use App\Models\Faq;

if (!function_exists('loadFaqs')){

    function loadFaqs(){
        return Faq::all();
    }
}
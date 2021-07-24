<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FrontController extends Controller
{

    public function index()
    {

        $faqs = $this->loadFaqs();

        return view('index', compact('faqs'));
    }


    public function loadFaqs()
    {
        return Faq::all();
    }
}

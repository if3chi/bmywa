<?php

namespace App\Http\Controllers;

use App\Models\Entry;

class FrontController extends Controller
{

    public function index()
    {

        $judges = loadJudges();

        $sponsors = loadSponsors();

        return view('index', compact('judges', 'sponsors'));
    }

    public function about()
    {
        return view('about');
    }

    public function previewEntry(Entry $entry)
    {
        return view('submission.preview', compact('entry'));
    }
}

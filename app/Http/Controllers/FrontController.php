<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Photo;

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

    public function gallery()
    {
        $photos = Photo::with('Album')->select('*')->get();
        $photos = $photos->count() ? $photos->random(3) : Photo::make();

        return view('gallery', compact('photos'));
    }
}

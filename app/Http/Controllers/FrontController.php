<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Judge;
use App\Models\Sponsor;

class FrontController extends Controller
{

    public function index()
    {

        $judges = Judge::all();
        $sponsors = Sponsor::select('name', 'logo')
            ->where('status', 1)
            ->get();

        return view('index', compact('judges', 'sponsors'));
    }

    public function previewEntry(Entry $entry)
    {
        return view('submission.preview', compact('entry'));
    }
}

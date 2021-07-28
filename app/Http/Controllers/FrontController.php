<?php

namespace App\Http\Controllers;

use App\Models\Judge;

class FrontController extends Controller
{

    public function index()
    {

        $judges = Judge::all();

        return view('index', compact('judges'));
    }
}

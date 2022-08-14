<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function popular()
    {
        return 'popular';
    }

    public function last()
    {
        return 'last';
    }

    public function peoples()
    {
        return 'peoples';
    }
}

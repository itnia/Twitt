<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class PostController extends Controller
{
    public function paginate () {
        $data = Data::orderBy('id', 'DESC')->paginate(10);
        return view('sections.post', ['posts' => $data]);
    }
}

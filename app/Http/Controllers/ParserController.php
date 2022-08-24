<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Parser;

class ParserController extends Controller
{
    public function index () {
        Parser::dispatch();
    }
}

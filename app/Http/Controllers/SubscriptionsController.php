<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index ()
    {
        $users = User::all();
        return view('connect_people', ['users' => $users]);
    }
}

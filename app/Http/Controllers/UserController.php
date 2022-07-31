<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

class UserController extends Controller
{
    public function index($user)
    {
        return view('profile', ['user' => User::where('name', $user)->first()]);
    }

    public function twits($user) {
        $user_id = User::where('name', $user)->first()->id;
        $messages = Message::where('user_id', $user_id)->get();
        return view('sections.message_group', ['messages' => $messages]);
    }

    public function with_replies() {

    }

    public function media() {

    }

    public function likes() {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function reg(Request $request)
    {
        $credentials = $request->validate([
            'password' => 'required',
            'name' => 'required'
        ]);

        $user = User::create($credentials);
        // if($user){
        //     Auth::login($user);
        // }
        return 'okey_auth';
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'name' => 'Error_auth',
        ]);
    }

    public function destroy(){
        Auth::logout();
        return redirect(route('home'));
    }
}

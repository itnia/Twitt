<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Token;

class AuthApiController extends Controller
{
    //

    public function login (Request $request) {

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $auth = User::where('name', $credentials['name'])->first();

        if (!$auth) return 'Error name';

        if (Hash::check($credentials['password'], $auth->password)) {
            return $this->generateToken($auth->name, 0);
        }
        return 'Error password';
    }

    public function logout()
    {
        $token = $request->bearerToken();
        $jwt = explode(".", $token);
        $payload = json_decode(base64_decode($jwt[1]), true);
        Token::destroy($payload['id']);
        return 'logout';
    }

    // public function me()
    // {
    //     return User::find(1);
    //     return response()->json(auth()->user());
    // }

    public function refresh(Request $request)
    {
        $token = $request->bearerToken();
        $jwt = explode(".", $token);
        $payload = json_decode(base64_decode($jwt[1]), true);
        $сode = Token::find($payload['id']);
        $сode->code = $сode->code + 1;
        $сode->save();
        return $this->generateToken($payload['name'], $сode->code, $payload['id']);
    }

    protected function generateToken($name, $code_a, $id = 0) {
        $header = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));

        // регистрация токена - для токена время жизни равное времени refresh - рерализовать

        if (!$code_a) {
            $code = Token::create([
                'code' => 0,
            ]);
        } else {
            $code = Token::find($id);
        }

        $payload = base64_encode(json_encode(['name' => $name, 'time' => time(), 'id' => $code->id, 'code' => $code_a]));
        $signature = hash_hmac('sha256', $header.$payload, 'secret');
        return $header.'.'.$payload.'.'.$signature;
    }
}

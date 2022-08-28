<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if (isset($token)) {
            $jwt = explode(".", $token);
            $payload = json_decode(base64_decode($jwt[1]), true);

            // проверка регистрации токена
            $id = $payload['id'];
            $code = Token::find($id);
            if (!isset($code->code)) {
                return abort(401);
            } 
            if ($code->code != $payload['code']) {
                return abort(401);
            }

            $time_jwt = 300; // время жизни токена в секундах
            if (($payload['time'] + $time_jwt) < time()) return abort(401);

            $signature = hash_hmac('sha256', $jwt[0].$jwt[1], 'secret');
            if($signature == $jwt[2]){
                return $next($request);
            }
        }
        return abort(401);
    }
}

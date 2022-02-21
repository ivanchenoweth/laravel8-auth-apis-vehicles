<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * Custom middleware Auth API class
 */
class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        if (Str::startsWith($header, 'Bearer ')) {
            $api_token = Str::substr($header, 7);
        }
        $user = User::where('api_token', '=', $api_token)->first();
        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Unautorized 1']);
        }
        return $next($request);
        
    }
}

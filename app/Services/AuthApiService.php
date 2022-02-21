<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthApiService 
{

    /**
     * Relocated function to  App\Http\Middleware\AuthApi;
     *
     * @param Request $request
     * @return void
     */
    public function profile(Request $request)
    {
        $header = $request->header('Authorization');
        $api_token="";
        if (Str::startsWith($header, 'Bearer ')) {
            $api_token = Str::substr($header, 7);
        }
        $user = User::where('api_token', '=', $api_token)->first();
        if (!$user) {
            return null;
        }
        return $user;
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }
        $user->api_token = Str::random(30);
        $user->save();
        return $user;

    }
    
}

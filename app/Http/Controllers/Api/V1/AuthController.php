<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->input('email'))->first();
            $token = $user->createToken('API')->accessToken;
            return response()->json([
                'status'    => true,
                'message'   => 'success',
                'token'     => $token
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'authentication failed',
            ]);
        }
    }
}

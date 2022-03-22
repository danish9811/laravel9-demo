<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PassportAuthController extends Controller {

    public function showLoginForm() {
        return view('login-form');
    }

    public function showRegisterForm() {
        return view('register-form');
    }

    public function passportAuthRegisterSubmit(Request $request) {

        $request->validate([
            'name' => 'required|string|max:40|min:5',
            'email' => 'required|email|max:60|unique:users|min:8',
            'password' => 'required|min:6|confirmed',
        ]);

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'location' => '/login',
            'message' => 'User ' . $request->name . ' registered successfully',
            'token' => $token
        ]);
    }


    public function passportAuthLoginSubmit(Request $request) {
        $request->validate([
            'email' => 'required|email|max:60|unique:users|min:8',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $user->id,
                    'client_secret' => $user->secret,
                    'username' => $user->email,
                    'password' => $user->password,
                    'scope' => null,
                ]);

                return response()->json([
                    // todo : this is not the right way of creating access tokens,
                    // this is personal access token, but we have to use the password grant client token
                    // 'token' => $user->createToken('API Token')->accessToken

                ]);
            }

            return response()->json([
                "message" => "Password mismatch"
            ], 422);
        }

        // return response()->json($response = ["message" => 'User does not exist'], 422);
        return response()->json([
            "message" => 'User does not exist'
        ], 422);
    }

    public function docsCode() {
        // define your own values here
        // define your own values here, and make it your own
        $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'username' => 'taylor@laravel.com',
            'password' => 'my-password',
            'scope' => '*',
        ]);
    }

    public function showApexChart() {
        return view('apexchart');
    }

}


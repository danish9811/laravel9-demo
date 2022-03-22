<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Passport\Client;

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
        User::create($request->toArray());

        return response()->json([
            'location' => '/login',
            'message' => 'User ' . $request->name . ' registered successfully',
        ]);
    }

    public function passportAuthLoginSubmit(Request $request) {

        dd($request->all());

        $request->validate([
            'email' => 'required|email|max:60|unique:users|min:8',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $client = Client::where('password_client', '=', 1)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $client->id,
                    'client_secret' => $client->secret,
                    'username' => $user->email,
                    'password' => $user->password,
                    'scope' => null,
                ]);

                return response()->json([
                    'location' => '/chart',
                    'message' => $response
                ]);
            }

            return response()->json([
                "message" => "Password mismatch"
            ]);
        }

        return response()->json([
            "message" => 'User does not exist'
        ]);
    }

    public function showApexChart() {
        return view('apexchart');
    }

}
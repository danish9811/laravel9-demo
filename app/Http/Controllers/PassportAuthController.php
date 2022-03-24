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
            'name' => 'required|min:6|max:40|',
            'email' => 'required|email|min:8|max:60|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        User::create($request->all());

        return response()->json([
            'location' => '/login',
            'message' => 'User ' . $request['name'] . ' registered successfully',
        ]);
    }

    public function passportAuthLoginSubmit(Request $request) {
        $request->validate([
            'email' => 'required|email|max:60|min:8',
            'password' => 'required|min:6',
        ]);

        $user = User::firstWhere('email', $request['email'])->first();
        $client = Client::firstWhere('password_client', '=', 1);

        if ($user) {
            if (Hash::check($request['password'], $user['password'])) {
                $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $client['id'],
                    'client_secret' => $client['secret'],
                    'redirect' => env('APP_URL') . '/apex-chart',
                    'username' => $user->email,
                    'password' => $user->password,
                    'scope' => '*',
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

    }

    public function showApexChart() {
        return view('apexchart');
    }

}
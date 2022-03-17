<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserAuthController extends Controller {

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());

        // this is not the right way of generating token, this is personal access token, 
        // we have to use password grant token, and that's method is different
        // https://laravel.com/docs/9.x/passport#password-grant-tokens
        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token
        ]);
    }

    // we can use the login method inside of the register method too, to avoid code duplication
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    // this is not the right way of creating access tokens, this is personal access token, but we have to use the password grant client token
                    'token' => $user->createToken('API Token')->accessToken
                ]);
            }
            return response()->json(["message" => "Password mismatch"], 422);
        }
        return response()->json($response = ["message" => 'User does not exist'], 422);
    }

}
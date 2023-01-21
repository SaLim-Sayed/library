<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_token' => Str::random(64),
        ]);

        //login
        Auth::login($user);

        return response()->json($user);
    }

    public function handlelogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $is_user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$is_user) {
            $errors = "credentials are not correct.";
            return response()->json($errors);
        }
        $user = User::where('email', '=', $request->email)->first();

        $new_access_token = Str::random(64);
        $user->update([
            'access_token' => $new_access_token,
        ]);
        return response()->json($user);
    }

    public function logout(Request $request)
    {
        $access_token = $request->access_token;
        $user = User::where('access_token', $access_token)->first();

        if ($user == null) {
            $errors = "tokens are not correct.";
            return response()->json($errors);
        }$user->update([
            'access_token' => null,
        ]);

        return response()->json("logout successfully");
    }

}

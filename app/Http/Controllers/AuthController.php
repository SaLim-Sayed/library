<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function welcome()
    {
        return view('auth.welcome');
    }
    public function handleRegister(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',
            // 'is_admin'=>'accepted'

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'is_admin' =>$request->is_admin,

        ]);
        //login
        Auth::login($user);


        //sending email

        // Mail::to($user->email)->send(new RegisterMail);

        return redirect(route('auth.welcome'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function handlelogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',
        ]);

        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$is_login) {
            return back();
        }
        return redirect(route('auth.welcome'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function redirectToProvider()
    {

        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        // dd($user);
        // $user->token;
        $email = $user->email;
        $db_user = User::where('email', '=', $email)->first();
        if ($db_user == null) {
            $registered_user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('123456'),
                'oauth_token' => $user->token,
            ]);
            Auth::login($registered_user);
        } else {
            Auth::login($db_user);
        }
        return redirect(route('auth.welcome'));
    }
}

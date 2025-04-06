<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|email',
            'password' => 'string|required|min:8'
        ]);

        $user = DB::table("users")->where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect()->route("home");
        }
        return redirect()->back()->withErrors(['email' => "Invalid Credentials"]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
            return view('auth.loginForm');
    }

    public function addTestuser(){
       
        $existingUser = DB::table('users')->where('email', 'test@example.com')->first();
        if ($existingUser) {
            return "Test user already exists. <a href='/loginForm'>go back</a>" ;
        }

        
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('loginForm');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $user = DB::table('users')->where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password))  
        {
            session(['loggedUser' => $user]);
            return redirect()->route('dash');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function dash()
    {
            $user = session('loggedUser');
            return view('Auth.dash', compact('user'));
    }

    public function logout()
    {
            session()->forget('loggedUser');
            return redirect()->route('loginForm');
    }


}
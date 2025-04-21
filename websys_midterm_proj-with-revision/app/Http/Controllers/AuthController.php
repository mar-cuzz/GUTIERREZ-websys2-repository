<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");

        if ($username == "gutierrez" && $password == "123") {
            // Store user session
            Session::put('user', $username);

            return redirect()->route('welcome');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        // Clear session and redirect to login
        Session::forget('user');
        return redirect()->route('login');
    }
}

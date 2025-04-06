<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view("auth.register");
    }
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route("registerform")->withErrors($validator)->withInput();
        }
        DB::table("users")->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return redirect()->route("login")->with("success", "Registration Successful");
    }
}
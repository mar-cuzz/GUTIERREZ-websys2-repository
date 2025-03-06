<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function handleForm(Request $request)
    {
        $validated = $request->validate([
            'Firstname' => 'required|string|max:50',
            'Lastname' => 'required|string|max:50',
            'Mobile' => ['required', 'regex:/^09\d{2}-\d{3}-\d{3}$/'],
            'TelephoneNo' => 'numeric',
            'Birthdate' => 'required|date_format:Y-m-d',
            'Address' => 'required|string|max:100',
            'Email' => 'required|email',
            'Website' => 'required|url',
        ]);

        return redirect()->back()->with('success', "Form Submitted Successfully");

    }
}

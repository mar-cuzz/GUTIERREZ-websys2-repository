<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch jobs using raw SQL
        $jobs = DB::select("SELECT * FROM jobs ORDER BY created_at DESC");

        // Fetch candidates using raw SQL
        $candidates = DB::select("SELECT * FROM candidates ORDER BY created_at DESC");

        // Pass data to the view
        return view('welcome', compact('jobs', 'candidates'));
    }
}

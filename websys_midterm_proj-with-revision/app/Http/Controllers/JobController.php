<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $limit = 5; // Number of jobs per page
        $offset = ($page - 1) * $limit;

        if ($search) {
            $query = "SELECT * FROM jobs WHERE title LIKE ? OR company_name LIKE ? OR company_addr LIKE ? ORDER BY created_at DESC LIMIT ? OFFSET ?";
            $jobs = DB::select($query, ["%$search%", "%$search%", "%$search%", $limit, $offset]);

            $countQuery = "SELECT COUNT(*) as total FROM jobs WHERE title LIKE ? OR company_name LIKE ? OR company_addr LIKE ?";
            $totalJobs = DB::select($countQuery, ["%$search%", "%$search%", "%$search%"])[0]->total;
        } else {
            $query = "SELECT * FROM jobs ORDER BY created_at DESC LIMIT ? OFFSET ?";
            $jobs = DB::select($query, [$limit, $offset]);

            $totalJobs = DB::select("SELECT COUNT(*) as total FROM jobs")[0]->total;
        }

        $totalPages = ceil($totalJobs / $limit);

        return view('jobs.index', compact('jobs', 'search', 'totalPages', 'page'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $salary = $request->input('salary');
        $company_name = $request->input('company_name');
        $company_addr = $request->input('company_addr');

        DB::statement("INSERT INTO jobs (title, description, salary, company_name, company_addr, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())", [
            $title,
            $description,
            $salary,
            $company_name,
            $company_addr
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit($id)
    {
        $job = DB::select("SELECT * FROM jobs WHERE id = ?", [$id]);

        if (empty($job)) {
            return redirect()->route('jobs.index')->with('error', 'Job not found.');
        }

        $job = $job[0];

        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $salary = $request->input('salary');
        $company_name = $request->input('company_name');
        $company_addr = $request->input('company_addr');

        DB::statement("UPDATE jobs SET title = ?, description = ?, salary = ?, company_name = ?, company_addr = ?, updated_at = NOW() WHERE id = ?", [
            $title,
            $description,
            $salary,
            $company_name,
            $company_addr,
            $id
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        DB::statement("DELETE FROM jobs WHERE id = ?", [$id]);
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    public function show($id)
    {
        $job = DB::select("SELECT * FROM jobs WHERE id = ?", [$id]);

        if (empty($job)) {
            return redirect()->route('jobs.index')->with('error', 'Job not found.');
        }

        $job = $job[0];
        $candidates = DB::select("SELECT * FROM candidates WHERE job_id = ?", [$id]);

        return view('jobs.show', compact('job', 'candidates'));
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $limit = 5;
        $offset = ($page - 1) * $limit;

        if ($search) {
            $query = "SELECT candidates.*, jobs.title AS job_title 
                  FROM candidates 
                  LEFT JOIN jobs ON candidates.job_id = jobs.id 
                  WHERE candidates.name LIKE ? 
                     OR candidates.email LIKE ? 
                     OR candidates.schooling LIKE ? 
                  ORDER BY candidates.created_at DESC 
                  LIMIT ? OFFSET ?";
            $candidates = DB::select($query, ["%$search%", "%$search%", "%$search%", $limit, $offset]);
        } else {
            $query = "SELECT candidates.*, jobs.title AS job_title 
                  FROM candidates 
                  LEFT JOIN jobs ON candidates.job_id = jobs.id 
                  ORDER BY candidates.created_at DESC 
                  LIMIT ? OFFSET ?";
            $candidates = DB::select($query, [$limit, $offset]);
        }

        $totalCandidates = DB::select("SELECT COUNT(*) as total FROM candidates")[0]->total;
        $totalPages = ceil($totalCandidates / $limit);

        return view('candidates.index', compact('candidates', 'search', 'totalPages', 'page'));
    }


    public function create(Request $request)
    {
        $jobId = $request->query('job_id'); // retrieve job_id from URL
        return view('candidates.create', compact('jobId'));
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $birthday = $request->input('bday');
        $schooling = $request->input('schooling');
        $experiences = $request->input('experiences');
        $jobId = $request->input('job_id'); // Get job_id from hidden field

        DB::statement("INSERT INTO candidates (name, email, phone, bday, schooling, experiences, job_id, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())", [
            $name,
            $email,
            $phone,
            $birthday,
            $schooling,
            $experiences,
            $jobId // Pass the job_id (can be null if not from job post)
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate added successfully.');
    }


    public function edit($id)
    {
        $candidate = DB::select("SELECT * FROM candidates WHERE id = ?", [$id]);

        if (empty($candidate)) {
            return redirect()->route('candidates.index')->with('error', 'Candidate not found.');
        }

        return view('candidates.edit', ['candidate' => $candidate[0]]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $birthday = $request->input('bday');
        $schooling = $request->input('schooling');
        $experiences = $request->input('experiences');

        DB::statement("UPDATE candidates SET name = ?, email = ?, phone = ?, bday = ?, schooling = ?, experiences = ?, updated_at = NOW() WHERE id = ?", [
            $name,
            $email,
            $phone,
            $birthday,
            $schooling,
            $experiences,
            $id
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy($id)
    {
        DB::statement("DELETE FROM candidates WHERE id = ?", [$id]);
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}

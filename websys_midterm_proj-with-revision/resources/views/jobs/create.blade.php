@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add a new Job Listing</h1>

        <div class="card shadow-sm p-4">
            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf

                <!-- Job Title Input -->
                <div class="mb-3">
                    <label class="form-label">Job Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter job title" required>
                </div>

                <!-- Job Description Input -->
                <div class="mb-3">
                    <label class="form-label">Job Description:</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter job description"
                        required></textarea>
                </div>

                <!-- Salary Input -->
                <div class="mb-3">
                    <label class="form-label">Salary:</label>
                    <input type="number" name="salary" class="form-control" placeholder="Enter salary amount" required>
                </div>

                <!-- Company Name Input -->
                <div class="mb-3">
                    <label class="form-label">Company Name:</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Enter company name" required>
                </div>

                <!-- Company Address Input -->
                <div class="mb-3">
                    <label class="form-label">Company Address:</label>
                    <textarea name="company_addr" class="form-control" rows="2" placeholder="Enter company address"
                        required></textarea>
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Job Listing</button>
                </div>
            </form>
        </div>
    </div>
@endsection
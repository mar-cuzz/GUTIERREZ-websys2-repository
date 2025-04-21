@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Edit Job</h1>

        <div class="card shadow-sm p-4">
            <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Job Title Input -->
                <div class="mb-3">
                    <label class="form-label">Job Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
                </div>

                <!-- Job Description Input -->
                <div class="mb-3">
                    <label class="form-label">Job Description:</label>
                    <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
                </div>
                <!-- Job Salary -->
                <div class="mb-3">
                    <label class="form-label">Salary:</label>
                    <input type="number" name="salary" class="form-control" placeholder="Enter salary amount" required>
                </div>

                <!-- Company Name Input -->
                <div class="mb-3">
                    <label class="form-label">Company Name:</label>
                    <input type="text" name="company_name" class="form-control" value="{{ $job->company_name }}" required>
                </div>

                <!-- Company Address Input -->
                <div class="mb-3">
                    <label class="form-label">Company Address:</label>
                    <textarea name="company_addr" class="form-control" required>{{ $job->company_addr }}</textarea>
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Job</button>
                </div>
            </form>
        </div>
    </div>
@endsection
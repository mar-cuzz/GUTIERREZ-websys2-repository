@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Candidate</h1>

        <div class="card shadow-sm p-4">
            <form action="{{ route('candidates.store') }}" method="POST">
                @csrf
                @if(isset($jobId))
                    <input type="hidden" name="job_id" value="{{ $jobId }}">
                @endif

                <div class="mb-3">
                    <label class="form-label">Full Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter candidate name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter candidate email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number (optional)">
                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday:</label>
                    <input type="date" name="bday" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Highest Attained Schooling:</label>
                    <input type="text" name="schooling" class="form-control" placeholder="Enter highest schooling level">
                </div>

                <div class="mb-3">
                    <label class="form-label">Work Experiences:</label>
                    <textarea name="experiences" class="form-control" rows="3"
                        placeholder="Enter job experiences"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Candidate</button>
                </div>
            </form>
        </div>
    </div>
@endsection
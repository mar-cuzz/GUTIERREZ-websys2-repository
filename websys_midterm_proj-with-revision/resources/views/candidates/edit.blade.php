@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Candidate</h1>

        <div class="card shadow-sm p-4">
            <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if(isset($candidate->job_id))
                    <input type="hidden" name="job_id" value="{{ $candidate->job_id }}">
                @endif

                <div class="mb-3">
                    <label class="form-label">Full Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $candidate->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $candidate->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" value="{{ $candidate->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday:</label>
                    <input type="date" name="bday" class="form-control" value="{{ $candidate->bday }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highest Attained Schooling:</label>
                    <input type="text" name="schooling" class="form-control" value="{{ $candidate->schooling }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Work Experiences:</label>
                    <textarea name="experiences" class="form-control" rows="3">{{ $candidate->experiences }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Candidate</button>
                </div>
            </form>
        </div>
    </div>
@endsection
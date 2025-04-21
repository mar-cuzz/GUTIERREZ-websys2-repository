@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2>{{ $job->title }}</h2>
            <p><strong>Company:</strong> {{ $job->company_name }}</p>
            <p><strong>Address:</strong> {{ $job->company_addr }}</p>
            <p><strong>Salary:</strong> ₱{{ number_format($job->salary, 2) }}</p>
            <p><strong>Posted on:</strong> {{ \Carbon\Carbon::parse($job->created_at)->format('F d, Y') }}</p>
            <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::parse($job->updated_at)->format('F d, Y') }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $job->description }}</p>

            <div class="mt-4">
                <a href="{{ route('candidates.create', ['job_id' => $job->id]) }}" class="btn btn-outline-success">Apply</a>
                <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">Back to Listings</a>
            </div>
        </div>

        @if(count($candidates) > 0)
            <div class="card">
                <div class="card-header">
                    <h4>Candidates Applied for this Job</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($candidates as $candidate)
                        <li class="list-group-item d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <strong class="h5">{{ $candidate->name }}</strong>
                                <span class="text-muted">{{ $candidate->email }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <p><strong>Phone:</strong> {{ $candidate->phone ?? 'N/A' }}</p>
                            <p><strong>Schooling:</strong> {{ $candidate->schooling }}</p>
                            <p><strong>Experiences:</strong> {{ $candidate->experiences }}</p>
                        </li>
                        <hr class="my-2">
                    @endforeach
                </ul>
            </div>
        @else
            <div class="alert alert-info">
                <p>No candidates have applied for this job yet.</p>
            </div>
        @endif
    </div>
@endsection
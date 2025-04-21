@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Job Portal</h1>

        <div class="row">
            <!-- Jobs Section -->
            <div class="col-md-6">
                <h4 class="text-start">Job Listings</h4>

                @foreach($jobs as $job)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text"><strong>Company:</strong> {{ $job->company_name }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $job->company_addr }}</p>
                            <p class="card-text">{{ $job->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Candidates Section -->
            <div class="col-md-6">
                <h4 class="text-end">Candidates</h4>

                @foreach($candidates as $candidate)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidate->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $candidate->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $candidate->phone ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Birthday:</strong>
                                {{ \Carbon\Carbon::parse($candidate->bday)->format('F d, Y') }}
                            </p>
                            <p class="card-text"><strong>Schooling:</strong> {{ $candidate->schooling }}</p>
                            <p class="card-text"><strong>Experiences:</strong> {{ $candidate->experiences }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
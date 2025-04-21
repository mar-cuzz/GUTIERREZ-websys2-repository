@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Job Listings</h1>

        <!-- Search Form -->
        <form action="{{ route('jobs.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search jobs..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
                @if(request('search'))
                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="text-end mb-3">
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">Add Job Listing</a>
        </div>

        <div class="row">
            @forelse($jobs as $job)
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <!-- Whole card becomes clickable except buttons -->
                            <a href="{{ route('jobs.show', $job->id) }}" class="text-decoration-none text-dark d-block mb-3">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text"><strong>Company:</strong> {{ $job->company_name }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $job->company_addr }}</p>
                                <p class="card-text"><strong>Salary:</strong> ₱{{ number_format($job->salary, 2) }}</p>
                                <p class="card-text"><strong>Posted on:</strong>
                                    {{ \Carbon\Carbon::parse($job->created_at)->format('F d, Y') }}</p>
                                <p class="card-text"><strong>Last Updated:</strong>
                                    {{ \Carbon\Carbon::parse($job->updated_at)->format('F d, Y') }}</p>
                                <p class="card-text">{{ $job->description }}</p>
                            </a>

                            <!-- Buttons sit below content -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>

                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No jobs found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($totalPages > 1)
            <nav>
                <ul class="pagination justify-content-center">
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('jobs.index', ['page' => $i, 'search' => request('search')]) }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </nav>
        @endif
    </div>
@endsection
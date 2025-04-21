@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Candidate List</h1>

        <!-- Search Form -->
        <form action="{{ route('candidates.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search candidates..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
                @if(request('search'))
                    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="text-end mb-3">
            <a href="{{ route('candidates.create') }}" class="btn btn-primary">Add Candidate</a>
        </div>

        <div class="row">
            @forelse($candidates as $candidate)
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidate->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $candidate->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $candidate->phone ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Birthday:</strong>
                                {{ \Carbon\Carbon::parse($candidate->bday)->format('F d, Y') }}</p>
                            <p class="card-text"><strong>Schooling:</strong> {{ $candidate->schooling }}</p>
                            <p class="card-text"><strong>Experiences:</strong> {{ $candidate->experiences }}</p>
                            <p class="card-text"><strong>Job ID:</strong> {{ $candidate->job_id ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Job Title:</strong> {{ $candidate->job_title ?? 'N/A' }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('candidates.edit', $candidate->id) }}"
                                    class="btn btn-outline-primary btn-sm">Edit</a>

                                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No candidates found.</p>
            @endforelse
        </div>
    </div>


    <!-- Pagination -->
    @if($totalPages > 1)
        <nav>
            <ul class="pagination justify-content-center">
                @for ($i = 1; $i <= $totalPages; $i++)
                    <li class="page-item {{ $page == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ route('candidates.index', ['page' => $i, 'search' => request('search')]) }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor
            </ul>
        </nav>
    @endif
@endsection
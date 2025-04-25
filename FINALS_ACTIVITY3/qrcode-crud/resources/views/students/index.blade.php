@extends('layouts.app')

@section('content')
    <h2>Student Master List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-2">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('students.index') }}" class="mb-3 d-flex" role="search">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2"
            placeholder="Search by name or student ID">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <table class="table table-bordered align-middle text-center">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>QR Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $stud)
                <tr>
                    <td>{{ $stud->stud_id }}</td>
                    <td>{{ $stud->name }}</td>
                    <td>{!! $stud->qr !!}</td>
                    <td>
                        <a href="{{ route('students.show', $stud) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $stud) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $stud) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('content')
    <h2>Add Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Student Id</label><input type="text" name="stud_id" class="form-control" required></div>
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Birth date</label><input type="date" name="bdate" class="form-control" required></div>
        <div class="mb-3"><label>Course</label><input type="text" name="course" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
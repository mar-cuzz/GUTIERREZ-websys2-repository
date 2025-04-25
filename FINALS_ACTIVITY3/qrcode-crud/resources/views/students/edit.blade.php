@extends('layouts.app')

@section('content')
        <h2>Edit Student Data</h2>
        <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3"><label>Student Id</label><input type="text" name="stud_id" class="form-control"
                                                        value="{{ $student->stud_id }}" required></div>
                        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control"
                                                        value="{{ $student->name }}" required></div>
                        <div class="mb-3"><label>Birth date</label><textarea name="bdate"
                                                        class="form-control">{{ $student->description }}</textarea></div>
                        <div class="mb-3"><label>Course</label><textarea name="course"
                                                        class="form-control">{{ $student->course }}</textarea></div>
                        <button type="submit" class="btn btn-primary">Update</button>
        </form>
@endsection
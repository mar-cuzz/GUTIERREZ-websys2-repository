@extends('layouts.app')

@section('content')
    <h2>Edit Student Data</h2>
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control"
                value="{{ $student->name }}" required></div>
        <div class="mb-3"><label>Description</label><textarea name="description"
                class="form-control">{{ $student->description }}</textarea></div>
        <div class="mb-3"><label>Price</label><input type="number" step="0.01" name="price" class="form-control"
                value="{{ $student->price }}" required></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
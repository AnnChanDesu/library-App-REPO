@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student Number</label>
            <input type="text" name="student_number" class="form-control" value="{{ $student->student_number }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $student->contact_number }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection

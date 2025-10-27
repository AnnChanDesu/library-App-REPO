@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Add Student</h1>

    <form action="{{ route('students.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Student Number (no dashes)</label>
            <input type="text" name="student_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact_number" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

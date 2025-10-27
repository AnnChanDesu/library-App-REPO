@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add Student</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Student Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

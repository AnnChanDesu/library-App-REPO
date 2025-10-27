@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Add Borrowing</h1>

    <form action="{{ route('borrowings.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->student_number }} - {{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Book</label>
            <select name="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} by {{ $book->author }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Return Date</label>
            <input type="date" name="return_date" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="borrowed" selected>Borrowed</option>
                <option value="returned">Returned</option>
            </select>
        </div>

        <button type="submit" class="btn">Save</button>
        <a href="{{ route('borrowings.index') }}" class="btn">Cancel</a>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Borrowing</h1>

    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="student_id" class="form-control" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $borrowing->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->student_number }} - {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Book</label>
            <select name="book_id" class="form-control" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} by {{ $book->author }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" class="form-control" value="{{ $borrowing->borrow_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Return Date</label>
            <input type="date" name="return_date" class="form-control" value="{{ $borrowing->return_date }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="borrowed" {{ $borrowing->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option value="returned" {{ $borrowing->status == 'returned' ? 'selected' : '' }}>Returned</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

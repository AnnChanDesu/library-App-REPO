@extends('layouts.app')

@section('content')
<h1 class="mb-3">Borrowings</h1>
<a href="{{ route('borrowings.create') }}" class="btn btn-success mb-3">Add Borrowing</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Student</th>
            <th>Book</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->student->name }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->borrow_date }}</td>
                <td>{{ $borrowing->return_date ?? 'Not Returned' }}</td>
                <td>{{ ucfirst($borrowing->status) }}</td>
                <td>
                    @if($borrowing->status !== 'returned')
                        <form action="{{ route('borrowings.returned', $borrowing->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Mark Returned</button>
                        </form>
                    @else
                        <span class="badge bg-success">Returned</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

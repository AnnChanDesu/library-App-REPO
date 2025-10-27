@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Books List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add Book</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>

                        <!-- Delete button -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

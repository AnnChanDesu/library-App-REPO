@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<h1 class="mb-3">Add New Book</h1>

<form action="{{ route('books.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Book Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection

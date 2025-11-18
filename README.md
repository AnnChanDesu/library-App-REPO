# Simple Library Management System

## Project Title

Simple Library Management System

## Description / Overview

This project is a simple Library Management System built using Laravel. It allows users to manage books, categories, students, and borrowing records in a clean and organized way. The system demonstrates the use of CRUD operations (Create, Read, Update, Delete) following the MVC architecture pattern.

## Objectives

- To understand and apply the Model-View-Controller (MVC) architecture in Laravel.
- To implement CRUD operations for managing library data.
- To demonstrate database relationships such as one-to-many and many-to-one.
- To create a user-friendly interface for managing books, students, and borrowings.

## Features / Functionality

- Book Management - Add, edit, delete, and view books with category association.
- Category Management - Classify books into categories.
- Student Management - Keep track of registered students who borrow books.
- Borrowing System - Record when students borrow or return books.
- Simple Navigation - Clean table-based UI using Bootstrap for readability.

## Installation Instructions

1\. Clone or download the project.

2\. Run \`composer install\` to install dependencies.

3\. Copy \`.env.example\` to \`.env\` and set up your database connection.

4\. Run \`php artisan migrate\` to create tables in the database.

5\. (Optional) Run \`php artisan db:seed\` to insert sample data.

6\. Start the local development server using \`php artisan serve\`.

7\. Open \`<http://127.0.0.1:8000\`> in your browser.

## Usage

After installation, you can navigate through the system via the following pages:

- /books - View all books.
- /books/create - Add a new book.
- /students - View and manage students.
- /borrowings - Record and manage borrowings.

## Database Relationships

Here's how the relationships work in the system:

• A Category has many Books (One-to-Many).

• A Book belongs to one Category (Many-to-One).

• A Student has many Borrowings (One-to-Many).

• A Borrowing belongs to one Student and one Book (Many-to-One).

## MVC Architecture (Simplified Explanation)

The system follows Laravel's MVC (Model-View-Controller) structure:

- Model - Handles database interaction. Each table (Book, Category, Student, Borrowing) has a model that defines relationships and structure.
- View - Displays data to the user through Blade templates (e.g., book list, forms).
- Controller - Connects models and views. It processes user input, retrieves data, and returns the appropriate view.

## Screenshots or Code Snippets

Index blade of books:
<pre>
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

</pre>
</div>

Index blade of borrowings:
<pre>@extends('layouts.app')

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
</pre>

Index blade of categories:
<pre>@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Add Category</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
</pre>

Index blade of students:
<pre>@extends('layouts.app')

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
</pre>

## Contributors

Developed by: Sherlee Annejelic C. Dulay

Partner's Name for Merge Project: Lexter Aberin

## License

This project is open-source and free to use for educational purposes only.

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
    &lt;h1 class="mb-3"&gt;Books List&lt;/h1&gt;
    &lt;a href="{{ route('books.create') }}" class="btn btn-success mb-3"&gt;Add Book&lt;/a&gt;

    &lt;table class="table table-hover"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;Title&lt;/th&gt;
                &lt;th&gt;Author&lt;/th&gt;
                &lt;th&gt;Category&lt;/th&gt;
                &lt;th&gt;Actions&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            @foreach($books as $book)
                &lt;tr&gt;
                    &lt;td&gt;{{ $book->title }}&lt;/td&gt;
                    &lt;td&gt;{{ $book->author }}&lt;/td&gt;
                    &lt;td&gt;{{ $book->category->name }}&lt;/td&gt;
                    &lt;td&gt;
                        &lt;a href="{{ route('books.edit', $book->id) }}" class="btn btn-success btn-sm"&gt;Edit&lt;/a&gt;
                        &lt;form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline"&gt;
                            @csrf
                            @method('DELETE')
                            &lt;button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete?')"&gt;
                                Delete
                            &lt;/button&gt;
                        &lt;/form&gt;
                    &lt;/td&gt;
                &lt;/tr&gt;
            @endforeach
        &lt;/tbody&gt;
    &lt;/table&gt;
@endsection
</pre>
</div>



## Contributors

Developed by: Sherlee Annejelic C. Dulay

Partner's Name for Merge Project: Lexter Aberin

## License

This project is open-source and free to use for educational purposes only.

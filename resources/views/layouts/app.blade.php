<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="mb-4">
        <a href="{{ route('books.index') }}" class="btn btn-warning">Books</a>
        <a href="{{ route('categories.index') }}" class="btn btn-warning">Categories</a>
        <a href="{{ route('students.index') }}" class="btn btn-warning">Students</a>
        <a href="{{ route('borrowings.index') }}" class="btn btn-warning">Borrowings</a>
    </div>
    @yield('content')
</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['student', 'book'])->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $students = Student::all();
        $books = Book::all();
        return view('borrowings.create', compact('students', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
        ]);

        Borrowing::create($request->all());
        return redirect()->route('borrowings.index')->with('success', 'Borrowing record added successfully!');
    }

    public function edit(Borrowing $borrowing)
    {
        $students = Student::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'students', 'books'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
        ]);

        $borrowing->update($request->all());
        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated successfully!');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully!');
    }

    public function markReturned($id)
{
    $borrowing = Borrowing::findOrFail($id);
    $borrowing->status = 'returned';
    $borrowing->return_date = now(); // set today's date
    $borrowing->save();

    return redirect()->route('borrowings.index')->with('success', 'Book marked as returned.');
}

}

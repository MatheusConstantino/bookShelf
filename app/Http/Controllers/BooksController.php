<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $books = Books::all();
        return response()->json([
            'status' => 'success',
            'Books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_name'     => 'required|string|max:255',
            'book_isbn'     => 'required|int|max:10',
            'book_value'    => 'required|decimal'
        ]);

        $book = Books::create([
            'book_name' => $request->book_name,
            'book_isbn' => $request->book_isbn,
            'book_value' => $request->book_value,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Book created successfully',
            'Book' => $book,
        ]);
    }

    public function show($id)
    {
        $book = Books::find($id);
        return response()->json([
            'status' => 'success',
            'Book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_name'     => 'required|string|max:255',
            'book_isbn'     => 'required|int|max:10',
            'book_value'    => 'required|decimal'
        ]);

        $book = Books::find($id);
        $book->book_name = $request->book_name;
        $book->book_isbn = $request->book_isbn;
        $book->book_value = $request->book_value;
        $book->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated successfully',
            'todo' => $book,
        ]);
    }

    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book deleted successfully',
            'todo' => $book,
        ]);
    }

}

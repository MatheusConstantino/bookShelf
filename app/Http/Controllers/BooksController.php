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
        $books = Books::paginate();
        return response()->json([
            'status' => 'success',
            'Books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        if(!$request->book_name || !$request->book_isbn || !$request->book_value){
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill all fields'
            ]);
        }

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
        $book = Books::where('book_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'Book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        if(!$request->book_name || !$request->book_isbn || !$request->book_value){
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill all fields'
            ]);
        }

        $book = Books::where('book_id', $id)->update([
            'book_name'     => $request->book_name,
            'book_isbn'     => $request->book_isbn,
            'book_value'    => $request->book_value
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated successfully',
            'Book' => $book,
        ]);
    }

    public function destroy($id)
    {
        $book = Books::where('book_id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book deleted successfully',
            'book' => $book,
        ]);
    }

}

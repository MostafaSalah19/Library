<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCopy;
use App\Models\Book;
use App\Http\Requests\CreateBookCopyRequest;

class BookCopyController extends Controller
{
    public function index()
    {
        // $data = BookCopy::withTrashed()->orderby('id','ASC')->get();

        $data = BookCopy::all();
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->book_name = Book::where('id', '=', $info->book_id)->value('title');
            }
        }
        return view('book-copies.index', compact('data'));
    }

    public function create()
    {
        $books = Book::select("id", "title")->get();
        return view('book-copies.create', compact('books'));
    }


    public function store(CreateBookCopyRequest $request)
    {

        // $validated = $request->validate([
        //     'barcode' => 'required|string|max:64|unique:book_copies,barcode',
        //      'status' => 'in:available,loaned,repair,lost'
        // ]);


        $book_copy = new BookCopy();
        $book_copy->book_id = $request->book_id;
        $book_copy->barcode = $request->barcode;
        $book_copy->status = $request->status;
        $book_copy->save();
        $book = Book::find($request->book_id);
        $book->copies_count = BookCopy::where('book_id', $request->book_id)->count();
        $book->save();
        return redirect()->route('book-copies.index');
    }

    public function edit($id)
    {
        $book_copy = BookCopy::findOrFail($id);
        $books = Book::select("id", "title")->get();
        return view('book-copies.update', compact('book_copy', 'books'));
    }

    public function update(CreateBookCopyRequest $request, $id)
    {
        $book_copy = BookCopy::findOrFail($id);
        $book_copy->book_id = $request->book_id;
        $book_copy->barcode = $request->barcode;
        $book_copy->status = $request->status;
        $book_copy->save();
        $book = Book::find($request->book_id);
        $book->copies_count = BookCopy::where('book_id', $request->book_id)->count();
        $book->save();
        return redirect()->route('book-copies.index');
    }

    public function delete($id)
    {
        $book_copy = BookCopy::find($id);
        if ($book_copy->status === 'loaned') { 
            return response()->json(['error' => 'Cannot delete a copy currently on loan'], 422);
        }
        $book_copy->delete();

        // BookCopy::where('id', '=', $id)->forceDelete();

        return redirect()->route('book-copies.index');
    }
}

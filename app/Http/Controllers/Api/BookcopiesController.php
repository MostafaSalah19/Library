<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCopy;
use App\Models\Book;
use App\Http\Requests\CreateBookCopyRequest;

class BookcopiesController extends Controller
{
    public function index()
    {

        $data = BookCopy::paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->book_name = Book::where('id', '=', $info->book_id)->value('title');
            }
        }
        return response()->json(['bookcopies' => $data], 200);
    }

    public function store(CreateBookCopyRequest $request)
    {


        $book_copy = new BookCopy();
        $book_copy->book_id = $request->book_id;
        $book_copy->barcode = $request->barcode;
        $book_copy->status = $request->status;
        $book_copy->save();
        $book = Book::find($request->book_id);
        $book->copies_count = BookCopy::where('book_id', $request->book_id)->count();
        $book->save();
        return response()->json(['message' => 'Book copy created successfully'], 201);
    }

    public function show($id)
    {
        $data = BookCopy::find($id);
        if (!$data) {
            return response()->json(['error' => 'Book copy not found'], 404);
        }
        $data->book_name = Book::where('id', '=', $data->book_id)->value('title');
        return response()->json(['data' => $data], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\CreateBookRequest;

class BooksController extends Controller
{
    public function index(Request $request)
    {

        $data = Book::paginate(10);

        if ($request->has('q')) {
            $data = $data->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->has('author_name')) {
            $data = $data->whereHas('author', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->author_name . '%');
            });
        }

        if ($request->filled('category_name')) {
            $data = $data->where('category_name', $request->category_name);
        }

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->author_name = Author::where('id', '=', $info->author_id)->value('name');
                $info->category_name = Category::where('id', '=', $info->category_id)->value('name');
            }
        }

        return response()->json(['books' => $data], 200);
    }

    public function store(CreateBookRequest $request)
    {

        $book = new Book();
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_year = $request->published_year;
        $book->pages = $request->pages;
        $book->save();
        return response()->json(['message' => 'Book created successfully'], 201);
    }


    public function show($id)
    {
        $data = Book::find($id);
        if (!$data) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        $data->author_name = Author::where('id', '=', $data->author_id)->value('name');
        $data->category_name = Category::where('id', '=', $data->category_id)->value('name');
        
        return response()->json(['data' => $data], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BooksController extends Controller
{
    public function index(Request $request){

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

        return response()->json(['books'=>$data], 200);
    }
}

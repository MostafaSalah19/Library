<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCopy;
use App\Models\Book;

class BookcopiesController extends Controller
{
    public function index(){

         $data = BookCopy::paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->book_name = Book::where('id', '=', $info->book_id)->value('title');
            }
        }
        return response()->json(['bookcopies'=>$data], 200);
    }
}

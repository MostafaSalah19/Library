<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use App\Models\BookCopy;

class LoansController extends Controller
{
    public function index()
    {
        $data = Loan::paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->member_name = Member::where('id', '=', $info->member_id)->value('name');
                $info->book_title = BookCopy::where('id', '=', $info->book_copy_id)->value('book_id');
                $info->book_title = Book::where('id', '=', $info->book_title)->value('title');
            }
        }
        return response()->json(['loans'=>$data], 200);
    }
}

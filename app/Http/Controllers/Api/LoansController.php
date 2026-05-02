<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use App\Models\BookCopy;
use App\Http\Requests\Loan\CreateBorrowRequest;
use App\Http\Requests\Loan\CreateReturnRequest;

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
        return response()->json(['loans' => $data], 200);
    }


    public function store(CreateBorrowRequest $request)
    {

        $borrowed_at = now()->toDateString();
        $days = $request->input('days', 14);
        $due_at = now()->addDays($days)->toDateString();

        $loan = new Loan();
        $loan->member_id    = $request->member_id;
        $loan->book_copy_id = $request->book_copy_id;
        $loan->borrowed_at  = $borrowed_at;
        $loan->due_at       = $due_at;
        $loan->days         = $days;
        $loan->fine         = 0;
        $loan->save();


        BookCopy::where('id', $request->book_copy_id)->update(['status' => 'loaned']);
        return response()->json(['message' => 'Loan created successfully'], 201);
    }

    public function show($id)
    {
        $data = Loan::find($id);
        if (!$data) {
            return response()->json(['error' => 'Loan not found'], 404);
        }
        $data->member_name = Member::where('id', '=', $data->member_id)->value('name');
        $data->book_title = BookCopy::where('id', '=', $data->book_copy_id)->value('book_id');
        $data->book_title = Book::where('id', '=', $data->book_title)->value('title');

        return response()->json(['data' => $data], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use App\Models\BookCopy;
use App\Http\Requests\Loan\CreateBorrowRequest;
use App\Http\Requests\Loan\CreateReturnRequest;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $data = Loan::all();
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->member_name = Member::where('id', '=', $info->member_id)->value('name');
                $info->book_title = BookCopy::where('id', '=', $info->book_copy_id)->value('book_id');
                $info->book_title = Book::where('id', '=', $info->book_title)->value('title');
            }
        }
        return view('loans.index', compact('data'));
    }


    public function borrow()
    {

        $members = Member::select("id", "name")->get();
        $book_copies = BookCopy::where('status', 'available')->get();
        foreach ($book_copies as $copy) {
            $copy->book_title = Book::where('id', '=', $copy->book_id)->value('title');
        }
        $borrow_at = now()->toDateString();
        $due_at = now()->addDays(14)->toDateString(); // افتراض فترة الإعارة 14 يوم

        return view('loans.borrow', compact('members', 'book_copies', 'borrow_at', 'due_at'));
    }


    public function returnBook($loanId)
    {
        $loan = Loan::findOrFail($loanId);
        $loan->returned_at = now()->toDateString();
        if ($loan->returned_at > $loan->due_at) {
            $daysLate = (strtotime($loan->returned_at) - strtotime($loan->due_at)) / (60 * 60 * 24);
            $loan->fine = $daysLate * 2; // افتراض غرامة يومية قدرها 1 وحدة نقدية
        } else {
            $loan->fine = 0;
        }
        BookCopy::where('id', $loan->book_copy_id)->update(['status' => 'available']);
        $loan->save();
        return redirect()->route('loans.index');
    }

    public function store(CreateBorrowRequest $request)
    {
        // $request->validate([
        //     'member_id' => 'required',
        //     'book_copy_id' => 'required', // تأكد من وجود هذا التحقق
        //     // ... بقية التحققا
        // ]);

        $borrowed_at = now()->toDateString(); 
        $days = $request->input('days', 14); 
        $due_at = now()->addDays($days)->toDateString();

        Loan::create([
            'member_id'    => $request->member_id,
            'book_copy_id' => $request->book_copy_id,
            'borrowed_at'  => $borrowed_at, 
            'due_at'       => $due_at,
            'days'         => $days,
            'fine'         => 0,
        ]);
        
        BookCopy::where('id', $request->book_copy_id)->update(['status' => 'loaned']);
        return redirect()->route('loans.index')->with('success', 'تمت عملية الإعارة بنجاح');
    }

    public function update(CreateReturnRequest $request, $loanId)
    {

        $loan = Loan::findOrFail($loanId);
        $loan->member_id = $request->member_id;
        $loan->book_copy_id = $request->book_copy_id;
        $loan->borrowed_at = $request->borrowed_at;
        $loan->due_at = $request->due_at;
        $loan->save();
        return redirect()->route('loans.index')->with('success', 'تم تحديث عملية الإعارة بنجاح');
    }
}

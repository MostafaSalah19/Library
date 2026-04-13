<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;
    protected $fillable = [
        'member_id',
        'book_copy_id',
        'borrowed_at',
        'due_at',
        'returned_at',
        'fine',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class);
    }
}

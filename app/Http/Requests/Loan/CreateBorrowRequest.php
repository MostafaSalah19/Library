<?php

namespace App\Http\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class CreateBorrowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'member_id' => 'required|exists:members,id',
            'book_copy_id' => 'required|exists:book_copies,id',
            'days' => 'nullable|integer|min:1|max:60',
        ];
    }

    public function messages(): array
    {
        return [
            'member_id.required' => 'The member field is required.',
            'member_id.exists' => 'The selected member is invalid.',
            'book_copy_id.required' => 'The book field is required.',
            'book_copy_id.exists' => 'The selected book is invalid.',
            'days.integer' => 'The days field must be an integer.',
            'days.min' => 'The days field must be at least 1.',
            'days.max' => 'The days field may not be greater than 60.',
        ];
    }   
}

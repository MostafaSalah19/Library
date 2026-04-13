<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookCopyRequest extends FormRequest
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
            'barcode' => 'required|string|max:64|unique:book_copies,barcode',
            'status' => 'in:available,loaned,repair,lost'
        ];
    }

        public function messages(): array
        {
            return [
                'barcode.required' => 'The barcode field is required.',
                'barcode.string' => 'The barcode must be a string.',
                'barcode.max' => 'The barcode may not be greater than 64 characters.',
                'barcode.unique' => 'The barcode has already been taken.',
                'status.in' => 'The status must be one of the following: available, loaned, repair, lost.',
            ];
        }
}

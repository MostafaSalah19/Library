<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'title' =>'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'author_id' =>'exists:authors,id',
            'category_id' =>'nullable|exists:categories,id',
            'pages' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'isbn.required' => 'The ISBN field is required.',
            'isbn.string' => 'The ISBN must be a string.',
            'isbn.max' => 'The ISBN may not be greater than 20 characters.',
            'isbn.unique' => 'The ISBN has already been taken.',
            'author_id.exists' => 'The selected author does not exist.',
            'category_id.exists' => 'The selected category does not exist.',
            'pages.required' => 'The pages field is required.',
            'pages.integer' => 'The pages must be an integer.',
            'pages.min' => 'The pages must be at least 1.',
        ];
    }
}

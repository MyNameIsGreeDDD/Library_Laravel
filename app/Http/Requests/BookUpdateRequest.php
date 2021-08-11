<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|min:3|max:100",
            'publication_year' => "required|integer|min:4|max:4",
            'authorsId' => "required|array",
            'authorsId.*' => "required|integer"
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title field must not be empty',
            'title.min' => "Minimum number of characters in the title is 3",
            'title.max' => "Maximum number of characters in the title is 100",
            'publication_year.required' => 'Publication year field must not be empty',
            'publication_year.min' => "Minimum number of characters in the publication year - 4",
            'publication_year.max' => "Maximum number of characters in the publication year - 4",
            'authorsId.required' => 'Choose author(s)',
            'authorsId' => "Choose author(s)",
            'authorsId.*' => "Choose author(s)"
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|min:2,max:20',
            'lastname' => 'required|string|min:2,max:20',
            'patronymic' => 'required|string|min:2,max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'Firstname field must not be empty',
            'firstname.min' => 'Minimum number of characters in the firstname is 2',
            'firstname.max' => 'Maximum number of characters in the firstname is 20',
            'lastname.required' => 'Lastname field must not be empty',
            'lastname.min' => 'Minimum number of characters in the lastname is 2',
            'lastname.max' => 'Maximum number of characters in the lastname is 20',
            'patronymic.required' => 'Patronymic field must not be empty',
            'patronymic.min' => 'Minimum number of characters in the patronymic is 2',
            'patronymic.max' => 'Maximum number of characters in the patronymic is 20',
        ];
    }
}

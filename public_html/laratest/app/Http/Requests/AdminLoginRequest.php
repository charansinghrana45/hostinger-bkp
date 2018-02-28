<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         => 'required|unique:customers',
            'password'      => 'required|alpha',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute is required.',
            'email.unique' => ':attribute is already exists.',
            'password.required' => ':attribute is required.',
            'password.alpha' => ':attribute should contain alphabetic characters only.'
        ];
    }
}

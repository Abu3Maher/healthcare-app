<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $rules['username'] = [
            'required',
        ];

        $rules['password'] = [
            'required',
            'max:64',
        ];
        return $rules;
    }
}

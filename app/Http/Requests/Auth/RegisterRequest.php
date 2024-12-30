<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc:dns',
                Rule::unique('users', 'email'),
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username'),
            ],
            'password' => [
                'required',
                'min:8',
                'max:64',
                'confirmed',
            ],
            'role' => [
                'required',
            ],
            'name' => [
                'required',
                'min:2',
                'max:64',
            ],
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        // here I want to generate username unique from the name

//        $username = ;

        return $data;
    }
}

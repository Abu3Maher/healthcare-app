<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
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
            'image' => [
                'nullable',
                'image',
                'max:2096',
                'mimes:jpg,jpeg,png,svg,webp',
            ],
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
        do {
            $username = strtolower(trim($data['name']));
            $username = preg_replace('/[^a-z0-9_]/', '', str_replace(' ', '_', $username));

            $existingUsername = User::query()->where('username', $username)->first();

        } while ($existingUsername);

        $data['username'] = $username;

        return $data;
    }
}

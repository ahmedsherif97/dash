<?php

namespace App\Http\Requests\Dashboard\Administration;

use App\Support\Traits\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminRequest extends FormRequest
{
    use ValidationRequest;

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'gender' => 'required|in:male,female',
            'password' => ['required', 'confirmed', Password::min(4)],
            'avatar' => 'nullable|image',
            'roles' => 'required|array',
            'active' => 'nullable',
        ];
        if (str_contains(url()->current(), request()->route('id'))) {
            $rules['name'] = 'required|string|max:100';
            $rules['password'] = ['nullable', 'confirmed', Password::min(4)];
            $rules['email'] = 'required|email|max:255|unique:users,email,' . request()->route('id');
            $rules['phone'] = 'required|numeric|unique:users,phone,' . request()->route('id');
        }
        return $rules;
    }
}

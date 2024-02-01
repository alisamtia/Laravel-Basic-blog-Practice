<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            "username"=>"required|min:8|max:40|unique:users,username",
            "avatar"=>"required",
            "role"=>"required|in:normal,admin,author",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|min:8|max:225"
        ];
    }
}

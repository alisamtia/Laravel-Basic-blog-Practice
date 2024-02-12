<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSettingsRequest extends FormRequest
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
            'title'=>'required|min:3|max:225',
            'tagline'=>'required|min:3|max:225',
            'description' => 'required|min:100|max:160',
            'keywords' => 'required|min:10|max:160',
            'favicon'=>'mimes:jpeg,jpg,gif,svg,png,ico'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewPostRequest extends FormRequest
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
            "title"=>"required|min:6",
            "body"=>"required|min:200|max:50000",
            "thumbnail"=>"required|image",
            "meta_keywords"=>"required|min:6|max:225",
            "meta_description"=>"required|min:100|max:160",
            "category_id"=>["required",Rule::exists("categories","id")]
        ];
    }
}

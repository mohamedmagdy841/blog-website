<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'name'=>"required|string",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:4096",
            'category_id' => 'required|exists:categories,id', // should exist in table categories column id
            "description"=>"required",
        ];
    }

    // to change the name so that it doesn't appear on the page as category_id
    public function attributes(): array
    {
        return [
            'category_id' => 'category'
        ];
    }
}

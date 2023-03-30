<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:25',
            'description' => 'required',
            'category' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'Min length of the title field is 3 symbols',
            'title.max' => 'Max length of the title field is 255 symbols',
            'description.required' => 'A description is required',
            'category.required' => 'A category is required', 
            'category.exists' => 'A category must to exist in categories table'
        ];
    }
}

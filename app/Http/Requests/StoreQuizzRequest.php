<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizzRequest extends FormRequest
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
            'question' => "required|string|max:255",
            'image' => 'nullable|image|mimes:jpeg,png,gif"',
            'correct_answer' => "required|string",
            'explanation' => "nullable|string|max:255",
            // 'image' => "nullable|image|mimes:jpeg,png,gif|max:2048",
        ];
    }
}

<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'province' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'grade' => 'required|integer|min:1|max:12',
            'teacher_id' => 'required|exists:teachers,id',
        ];
    }
}

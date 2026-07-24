<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class SaveAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Optionally check if user owns the attempt
    }

    public function rules(): array
    {
        return [
            'question_id' => 'required|exists:questions,id',
            'selected_options' => 'nullable|array',
            'selected_options.*' => 'integer|exists:question_options,id',
            'numerical_answer' => 'nullable|numeric',
            'time_spent_seconds' => 'required|integer|min:0',
            'is_marked_review' => 'boolean'
        ];
    }
}

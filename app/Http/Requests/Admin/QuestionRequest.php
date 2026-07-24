<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question_text_en' => 'required|string',
            'type' => 'required|string',
            'correct_option' => 'required|string',
        ];
    }
}

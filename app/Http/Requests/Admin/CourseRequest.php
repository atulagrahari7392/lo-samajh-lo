<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_en' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
        ];
    }
}

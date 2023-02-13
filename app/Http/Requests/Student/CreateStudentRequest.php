<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => [
                'required',
                'max:400',
                'string'
            ],
            'organization' => [
                'required',
                'exists:organizations,id',
                'integer'
            ]
        ];
    }
}

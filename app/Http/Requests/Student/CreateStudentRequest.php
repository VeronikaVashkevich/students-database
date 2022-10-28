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
            'date_start_study' => [
                'required',
                'date',
            ],
            'date_finish_study' => [
                'required',
                'date',
            ],
            'group' => [
                'required',
                'exists:groups,id',
                'integer'
            ],
            'organization' => [
                'required',
                'exists:organizations,id',
                'integer'
            ],
            'courses.*' => [
                'required',
                'exists:courses,id',
                'integer'
            ]
        ];
    }
}

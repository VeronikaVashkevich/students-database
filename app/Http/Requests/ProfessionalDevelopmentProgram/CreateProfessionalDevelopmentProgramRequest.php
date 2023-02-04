<?php

namespace App\Http\Requests\ProfessionalDevelopmentProgram;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfessionalDevelopmentProgramRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:400',
            'date_approval_faculty' => 'required|date',
            'date_approval_council' => 'required|date',
            'date_approval_rector' => 'required|date',
            'education_program' => 'required'
        ];
    }
}

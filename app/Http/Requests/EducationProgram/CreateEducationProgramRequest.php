<?php

namespace App\Http\Requests\EducationProgram;

use Illuminate\Foundation\Http\FormRequest;

class CreateEducationProgramRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:300'
        ];
    }
}

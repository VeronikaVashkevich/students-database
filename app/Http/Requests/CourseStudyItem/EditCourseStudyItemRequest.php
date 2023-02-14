<?php

namespace App\Http\Requests\CourseStudyItem;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseStudyItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
            'course' => [
                'required',
                'exists:courses,id',
                'integer'
            ]
        ];
    }
}

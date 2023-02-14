<?php

namespace App\Http\Requests\CourseStudyItem;

use App\Services\CourseStudyItemsService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCourseStudyItemRequest extends FormRequest
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
            ],
            'student' => [
                'required',
                'exists:students,id',
                'integer'
            ],
            'course_category' => [
                'required',
                Rule::in(array_keys(CourseStudyItemsService::COURSE_CATEGORIES))
            ]
        ];
    }
}

<?php


namespace App\Http\Controllers;


use App\Http\Requests\CourseStudyItem\CreateCourseStudyItemRequest;
use App\Models\Course;
use App\Models\Student;

class CourseStudyItemController extends Controller
{
    public function createStudyItem()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('courseStudyItems/create', compact('courses', 'students'));
    }

    public function storeStudyItem(CreateCourseStudyItemRequest $request)
    {
        return response()->json([
            'message' => 'Информация сохранена успешно'
        ], 201);
    }
}

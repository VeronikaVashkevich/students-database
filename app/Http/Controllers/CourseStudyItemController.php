<?php


namespace App\Http\Controllers;


use App\Http\Requests\CourseStudyItem\CreateCourseStudyItemRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use App\Services\CourseStudyItemsService;

class CourseStudyItemController extends Controller
{
    public function createStudyItem()
    {
        $courses = Course::all();
        $students = Student::all();
        $groups = Group::all();
        return view('courseStudyItems/create', compact('courses', 'students', 'groups'));
    }

    public function storeStudyItem(CreateCourseStudyItemRequest $request)
    {
        $service = new CourseStudyItemsService();
        $service->createItem($request);

        return redirect('/students');
    }
}

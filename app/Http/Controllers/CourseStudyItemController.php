<?php


namespace App\Http\Controllers;


use App\Http\Requests\CourseStudyItem\CreateCourseStudyItemRequest;
use App\Http\Requests\CourseStudyItem\EditCourseStudyItemRequest;
use App\Models\Course;
use App\Models\CourseStudyItem;
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
        $courseCategories = CourseStudyItemsService::COURSE_CATEGORIES;

        return view('courseStudyItems.create', compact('courses', 'students', 'groups', 'courseCategories'));
    }


    public function editStudyItem(CourseStudyItem $item) {
        $courses = Course::all();
        $students = Student::all();
        $groups = Group::all();
        $courseCategories = CourseStudyItemsService::COURSE_CATEGORIES;

        return view('courseStudyItems.edit', [
            'courses' => $courses,
            'students' => $students,
            'groups' => $groups,
            'item' => $item,
            'courseCategories' => $courseCategories
        ]);
    }

    public function storeStudyItem(CreateCourseStudyItemRequest $request)
    {
        $service = new CourseStudyItemsService();
        $service->createItem($request);

        return redirect('/students');
    }

    public function updateStudyItem(EditCourseStudyItemRequest $request, CourseStudyItem $item) {
        $service = new CourseStudyItemsService();
        $service->updateItem($request, $item);

        return redirect('/students'); 
    }
}

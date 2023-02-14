<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Course;
use App\Models\Student;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Http\Resources\GroupResource;
use App\Http\Resources\CourseResource;
use App\Services\CourseStudyItemsService;
use App\Http\Resources\OrganizationResource;
use App\Http\Requests\Student\CreateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $courseCategories = CourseStudyItemsService::COURSE_CATEGORIES;

        return view('students.index', compact('students', 'courseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = GroupResource::collection(Group::all());
        $courses = CourseResource::collection(Course::all());
        $organizations = OrganizationResource::collection(Organization::all());

        return view('students.create', compact('groups', 'courses', 'organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $service = new StudentService();
        $service->createStudent($request);

        return redirect('/students');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = GroupResource::collection(Group::all());
        $courses = CourseResource::collection(Course::all());
        $organizations = OrganizationResource::collection(Organization::all());

        return view('students.edit', [
            'student' => $student,
            'groups' => $groups,
            'courses' => $courses,
            'organizations' => $organizations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(CreateStudentRequest $request, Student $student)
    {
        $service = new StudentService();
        $service->createStudent($request, $student);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $service = new StudentService();
        $service->deleteStudent($student);

        return redirect('/students');
    }
}

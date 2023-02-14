<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use App\Models\Student;
use App\Services\CourseStudyItemsService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::all();
        $organizations = OrganizationResource::collection(Organization::all());
        $courseCategories = CourseStudyItemsService::COURSE_CATEGORIES;

        return view('home', compact('students', 'organizations', 'courseCategories'));
    }
}
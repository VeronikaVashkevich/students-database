<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\GroupResource;
use App\Models\Course;
use App\Models\Group;
use App\Models\Organization;
use App\Models\Student;
use App\Services\PrintService;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PrintController extends Controller
{
    public function print() {
        $courses = CourseResource::collection(Course::all());
        $groups = GroupResource::collection(Group::all());
        $organizations = OrganizationResource::collection(Organization::all());
        $students = Student::query()->orderBy('full_name', 'asc')->get();

        return view('print', compact('groups', 'courses', 'organizations', 'students'));
    }

    public function printExcel(Request $request) {
        $service = new PrintService();
        $spreadsheet = $service->getSpreadsheet($request);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="report-' . date('d-m-Y H-i-s') .'"');
        $writer->save('php://output');
    }
}

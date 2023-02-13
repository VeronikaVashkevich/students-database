<?php

namespace App\Services;

use App\Models\CourseStudyItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentService extends Service {
    
    public function createStudent($request, $studentFromRequest = []) {
        $data = $request->validated();

        $student = $this->saveStudent($request->only([
            'full_name',
            'organization',
        ]), $studentFromRequest);

        return $student;
    }

    public function storeCourses($courses, $student) {
        foreach($courses as $course) {
            DB::table('course_student')->insert([
                'student_id' => $student->id,
                'course_id' => $course
            ]);
        }
    }

    private function isValidDates($data) {
        return strtotime($data['date_start_study']) < strtotime($data['date_finish_study']);
    }

    private function getFullUserData($data) {
        $data['note'] = Auth::user()->name . ' изменил ' . date('d.m.Y H:i');

        return $data;
    }

    private function saveStudent($data, $studentFromRequest = []) {
        $data = $this->getFullUserData($data);

        $student = empty($studentFromRequest) ? new Student : $studentFromRequest;

        $student->full_name = $data['full_name'];
        $student->organization_id = $data['organization'];
        $student->note = (!empty($student->note) ? $student->note . "\r\n" : '') . $data['note'];

        $student->save();

        return $student;
    }

    public function deleteStudent($student) {
        $student->delete();
    }

}
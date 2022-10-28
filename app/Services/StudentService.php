<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentService extends Service {
    
    public function createStudent($request) {
        $data = $request->validated();

        if (!$this->isValidDates($data)) {
            throw ValidationException::withMessages(['date_finish_study' => Lang::get('validation.date_finish_study_error')]);
        }

        $student = $this->saveStudent($request->only([
            'full_name',
            'date_start_study',
            'date_finish_study',
            'group',
            'organization',
        ]));

        $courses = $data['courses'];

        foreach($courses as $course) {
            DB::table('course_student')->insert([
                'student_id' => $student->id,
                'course_id' => $course
            ]);
        }

        return $student;
    }

    private function isValidDates($data) {
        return strtotime($data['date_start_study']) < strtotime($data['date_finish_study']);
    }

    private function getFullUserData($data) {
        $data['note'] = Auth::user()->name . ' изменил ' . date('d.m.Y H:i');

        return $data;
    }

    private function saveStudent($data) {
        $data = $this->getFullUserData($data);

        $student = new Student;

        $student->full_name = $data['full_name'];
        $student->date_start_study = $data['date_start_study'];
        $student->date_finish_study = $data['date_finish_study'];
        $student->group_id = $data['group'];
        $student->organization_id = $data['organization'];
        $student->note = $data['note'];

        $student->save();

        return $student;
    }

    public function deleteStudent($student) {
        $student->delete();
    }

}
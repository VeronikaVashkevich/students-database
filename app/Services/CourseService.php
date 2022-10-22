<?php

namespace App\Services;

use App\Models\Course;

class CourseService extends Service {

    public function createCourse($request) {
        return Course::create($request->validated());
    }

    public function updateCourse($request, $course) {
        return $course->update($request->validated());
    }

    public function deleteCourse($course) {
        $course->delete();
    }

}
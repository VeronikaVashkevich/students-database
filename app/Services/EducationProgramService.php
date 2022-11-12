<?php

namespace App\Services;

use App\Models\EducationProgram;

class EducationProgramService extends Service {
    
    public function createProgram($request) {
        return EducationProgram::create($request->validated());
    }

    public function updateProgram($request, $program) {
        return $program->update($request->validated());
    }

    public function deleteProgram($program) {
        $program->delete();
    }

}
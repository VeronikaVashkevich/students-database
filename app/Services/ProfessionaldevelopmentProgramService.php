<?php

namespace App\Services;

use App\Models\ProfessionalDevelopmentProgram;

class ProfessionaldevelopmentProgramService extends Service {

    public function createProgram($request, $eidtablerProgram = false) {
        $program = !$eidtablerProgram ? new ProfessionalDevelopmentProgram : $eidtablerProgram;

        $program = $this->setProgramsFields($program, $request->validated());
        $program->save();

        return $program;
    }

    public function deleteProgram($program) {
        $program->delete();
    }

    private function setProgramsFields($program, $validated) {
        $program->name = $validated['name'];
        $program->date_approval_council = $validated['date_approval_council'];
        $program->date_approval_faculty = $validated['date_approval_faculty'];
        $program->date_approval_rector = $validated['date_approval_rector'];
        $program->education_program_id = $validated['education_program'];

        return $program;
    }

}
<?php

namespace App\Services;

use App\Models\ProfessionalDevelopmentProgram;

class ProfessionaldevelopmentProgramService extends Service {

    const PROGRAMS = [
        0 => 'Повышение квалификации',
        1 => 'Переподготовка'
    ];

    public function createProgram($request, $eidtablerProgram = false) {
        $program = !$eidtablerProgram ? new ProfessionalDevelopmentProgram : $eidtablerProgram;

        $program = ProfessionalDevelopmentProgram::create($request->validated());
        $program->save();

        return $program;
    }

    public function deleteProgram($program) {
        $program->delete();
    }

}
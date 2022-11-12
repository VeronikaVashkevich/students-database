<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalDevelopmentProgram\CreateProfessionalDevelopmentProgramRequest;
use App\Http\Resources\EducationProgramResource;
use App\Http\Resources\ProfessionalDevelopmentProgramResource;
use App\Models\EducationProgram;
use App\Models\ProfessionalDevelopmentProgram;
use App\Services\ProfessionaldevelopmentProgramService;

class ProfessionalDevelopmentProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professionalDevelopmentPrograms.index', [
            'programs' => ProfessionalDevelopmentProgramResource::collection(ProfessionalDevelopmentProgram::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professionalDevelopmentPrograms.create', [
            'educationPrograms' => EducationProgramResource::collection(EducationProgram::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProfessionalDevelopmentProgramRequest $request)
    {
        $service = new ProfessionaldevelopmentProgramService();
        $service->createProgram($request);

        return redirect('/professionalDevelopmentPrograms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfessionalDevelopmentProgram  $professionalDevelopmentProgram
     * @return \Illuminate\Http\Response
     */
    public function show(ProfessionalDevelopmentProgram $professionalDevelopmentProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfessionalDevelopmentProgram  $professionalDevelopmentProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfessionalDevelopmentProgram $professionalDevelopmentProgram)
    {
        return view('professionalDevelopmentPrograms.edit', [
            'educationPrograms' => EducationProgramResource::collection(EducationProgram::all()),
            'program' => $professionalDevelopmentProgram
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfessionalDevelopmentProgram  $professionalDevelopmentProgram
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProfessionalDevelopmentProgramRequest $request, ProfessionalDevelopmentProgram $professionalDevelopmentProgram)
    {
        $service = new ProfessionaldevelopmentProgramService();
        $service->createProgram($request, $professionalDevelopmentProgram);

        return redirect('/professionalDevelopmentPrograms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfessionalDevelopmentProgram  $professionalDevelopmentProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfessionalDevelopmentProgram $professionalDevelopmentProgram)
    {
        $service = new ProfessionaldevelopmentProgramService();
        $service->deleteProgram($professionalDevelopmentProgram);

        return redirect('/professionalDevelopmentPrograms');
    }
}

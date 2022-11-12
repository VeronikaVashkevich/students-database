<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationProgram\CreateEducationProgramRequest;
use App\Http\Resources\EducationProgramResource;
use App\Models\EducationProgram;
use App\Services\EducationProgramService;
use Illuminate\Http\Request;

class EducationProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('educationPrograms.index', [
            'programs' => EducationProgramResource::collection(EducationProgram::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educationPrograms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateEducationProgramRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEducationProgramRequest $request)
    {
        $service = new EducationProgramService();
        $service->createProgram($request);

        return redirect('/educationPrograms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return \Illuminate\Http\Response
     */
    public function show(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationProgram $educationProgram)
    {
        return view('educationPrograms.edit', [
            'program' => $educationProgram
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEducationProgramRequest $request, EducationProgram $educationProgram)
    {
        $service = new EducationProgramService();
        $service->updateProgram($request, $educationProgram);

        return redirect('/educationPrograms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationProgram $educationProgram)
    {
        $service = new EducationProgramService();
        $service->deleteProgram($educationProgram);

        return redirect('/educationPrograms');
    }
}

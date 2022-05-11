<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Resources\StudyListResource;
use App\Http\Resources\StudyResource;
use App\Models\Student;
use http\Env\Response;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudyResource::collection(Student::with(['group', 'studyPlan'])->get());
    }

    public function studyList()
    {
        return StudyListResource::collection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $createdStudent = Student::create($request->validated());
        return new StudyResource($createdStudent);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudyResource
     */
    public function show($id)
    {
        return new StudyResource(Student::with('group')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentStoreRequest $request, $id)
    {
        $updatedStudent = Student::find($id);
        $updatedStudent->update($request->validated());
        return new StudyResource($updatedStudent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedStudent = Student::find($id);
        $deletedStudent->delete();
        return response(null, 204);
    }
}

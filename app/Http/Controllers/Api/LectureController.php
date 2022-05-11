<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Http\Resources\LectureListResource;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return LectureListResource::collection(Lecture::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureRequest $request)
    {
        $createdLecture = Lecture::create($request->validated());
        return new LectureResource($createdLecture);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return LectureResource
     */
    public function show($id)
    {
        return new LectureResource(Lecture::with('students')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedLecture = Lecture::find($id);
        $updatedLecture->update($request->validated());
        return new LectureResource($updatedLecture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedLecture = Lecture::find($id);
        $deletedLecture->delete();
        return response(null, 204);
    }
}

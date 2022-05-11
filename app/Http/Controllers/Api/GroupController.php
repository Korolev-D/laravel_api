<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Resources\GroupListResource;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GroupResource::collection(Group::with(['students', 'studyPlan'])->get());
    }

    public function groupList()
    {
        return GroupListResource::collection(Group::all());
    }

    public function groupPlan()
    {
        return GroupListResource::collection(Group::with('lectures')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupStoreRequest $request)
    {
        $createdGroup = Group::create($request->validated());
        return new GroupResource($createdGroup);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new GroupResource(Group::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupStoreRequest $request, $id)
    {
        $updatedGroup = Group::find($id);
        $updatedGroup->update($request->validated());
        return new GroupResource($updatedGroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedGroup = Group::find($id);
        $deletedGroup->delete();
        return response(null, 204);
    }
}

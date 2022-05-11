<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "name"          => $this->name,
            "description"   => $this->description,
            "study_plan_id" => $this->study_plan_id,
            "created_at"    => $this->created_at,
            "group"         =>
                DB::table('lectures')
                    ->join('study_plans', 'lectures.study_plan_id', 'study_plans.id')
                    ->join('groups', 'study_plans.group_id', 'groups.id')
                    ->select('groups.name')
                    ->first(),
            "students"      => StudyListResource::collection($this->students)
        ];
    }
}

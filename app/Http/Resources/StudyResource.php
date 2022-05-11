<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudyResource extends JsonResource
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
            "id"         => $this->id,
            "name"       => $this->name,
            "email"      => $this->email,
            "created_at" => $this->created_at,
            "group"      => GroupResource::make($this->group),
            "study_plan" => StudyPlanResource::make($this->studyPlan),
            'lectures'   => LectureListResource::collection($this->lectures)
        ];
    }
}

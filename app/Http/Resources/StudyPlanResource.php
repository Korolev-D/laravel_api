<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudyPlanResource extends JsonResource
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
            "group_id"   => $this->group_id,
            "created_at" => $this->created_at,
            "lectures"   => LectureListResource::collection($this->lectures)
        ];
    }
}

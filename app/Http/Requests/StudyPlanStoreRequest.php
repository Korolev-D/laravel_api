<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyPlanStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => 'required|string',
            'group_id' => 'required|integer',
            'lectures' => 'array:name,description'
//            'lectures' => [
//                'name'          => 'required|string',
//                'description'   => 'required|string',
//                'study_plan_id' => 'required|integer'
//            ]
        ];
    }
}

<?php

namespace App\Service;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\LectureStudent;

class StudyPlanService extends Controller
{
    static function updateLectory($request)
    {
        $namesLectureFromBD = Lecture::pluck('name')->toArray();
        $LecturesFromRequest = $request->data[0]['lectures'];

        $namesLectureFromRequest = array_map(function ($item) {
            return $item['name'];
        }, $LecturesFromRequest);

        $namesLectureNotRequest = array_diff($namesLectureFromBD, $namesLectureFromRequest);
        $namesLectureNotBD = array_diff($namesLectureFromRequest, $namesLectureFromBD);

        //delete
        if (!empty($namesLectureNotRequest)) {
            foreach ($namesLectureNotRequest as $nameLectureNotRequest) {
                $idLectureNotRequest = Lecture::where('name', $nameLectureNotRequest)->pluck('id')->first();
                LectureStudent::where('lecture_id', '=', $idLectureNotRequest)->delete();
                Lecture::where('id', $idLectureNotRequest)->delete();
            }
        }

        //add
        if (!empty($namesLectureNotBD)) {
            $LecturesNotBD = array_filter($LecturesFromRequest, function ($item) use ($namesLectureNotBD) {
                return (in_array($item['name'], $namesLectureNotBD));
            });
            foreach ($LecturesNotBD as $LectureNotBD) {
                Lecture::create([
                    'name'          => $LectureNotBD['name'],
                    'description'   => $LectureNotBD['description'],
                    'study_plan_id' => $LectureNotBD['study_plan_id']
                ]);
            }
        }
    }
}

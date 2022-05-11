<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Lecture;
use App\Models\LectureStudent;
use App\Models\Student;
use App\Models\Study_plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Group::factory(1)->create();
//        Student::factory(30)->create();
//        Lecture::factory(50)->create();
//        LectureStudent::factory(50)->create();

        $lectures = DB::table('lectures')->pluck('id');
        $students = DB::table('students')->pluck('id');

        foreach ($students as $student) {
            foreach ($lectures as $lecture) {
                DB::table('lecture_student')
                    ->insert(['lecture_id' => $lecture, 'student_id' => $student]);
            }
        }
    }

}

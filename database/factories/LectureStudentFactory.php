<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LectureStudent>
 */
class LectureStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lecture_id'=>$this->faker->numberBetween(55,104),
            'student_id'=>$this->faker->numberBetween(1,30),
        ];
    }
}

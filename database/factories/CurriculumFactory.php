<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(25),
            'course_id' => 1,
            'week_day' => $this->faker->dayOfWeek,
            'class_time' => $this->faker->time,
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d')
        ];
    }
}

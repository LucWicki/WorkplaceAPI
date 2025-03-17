<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Weekday;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'weekday_id' => $this->faker->randomElement(Weekday::pluck('id')->toArray()),
            'departmentname' => fake()->name(),
            'departmentwebsite' => fake()->name(),
        ];
    }
}

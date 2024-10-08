<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'book' => $this->faker->randomNumber(),
            'slug' => $this->faker->name,
            'year' => rand(2000, 2021),
            'price' => rand(0, 1000),
            'image' => $this->faker->name,
            'description' => $this->faker->text(40),
            'link' => $this->faker->text(30),
            'submitted_by' => User::all()->random()->id,
            'duration' => rand(1, 10),
            'platform_id' => Platform::all()->random()->id,
        ];
    }
}

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
            'price' => $this->faker->randomFloat(),
            'image' => $this->faker->name,
            'description' => $this->faker->text,
            'link' => $this->faker->text,
            'submitted_by' => User::all()->random()->id,
            'duration' => $this->faker->randomNumber(1,2),
            'platform_id' => Platform::all()->random()->id,
        ];
    }
}

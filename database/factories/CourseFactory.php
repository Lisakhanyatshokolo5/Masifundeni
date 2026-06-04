<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'user_id'     => User::factory(),          // creates an instructor by default
            'title'       => $this->faker->words(4, true),
            'code'        => strtoupper($this->faker->unique()->bothify('??###')),
            'description' => $this->faker->paragraph(),
            'status'      => $this->faker->randomElement(['draft', 'published']),
            'credits'     => $this->faker->numberBetween(1, 4),
        ];
    }

    public function published(): static
    {
        return $this->state(['status' => 'published']);
    }

    public function draft(): static
    {
        return $this->state(['status' => 'draft']);
    }

    public function forInstructor(User $instructor): static
    {
        return $this->state(['user_id' => $instructor->id]);
    }
}


<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function student(): static
    {
        return $this->state(fn () => ['role' => 'student'])
                    ->afterCreating(function ($user) {
                        \App\Models\StudentProfile::create([
                            'user_id'        => $user->id,
                            'student_number' => 'STU-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
                            'phone'          => fake()->phoneNumber(),
                            'date_of_birth'  => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
                            'address'        => fake()->address(),
                            'status'         => 'active',
                        ]);
                    });
    }

    public function instructor(): static
    {
        return $this->state(fn () => ['role' => 'instructor']);
    }

    public function admin(): static
    {
        return $this->state(fn () => ['role' => 'admin']);
    }
}

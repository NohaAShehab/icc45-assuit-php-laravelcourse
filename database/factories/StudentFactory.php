<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'grade' => $this->faker->numberBetween(1,100),
            'track_id'=>2,
            'email' => $this->faker->unique()->safeEmail(),
            'gender'=>$this->faker->randomElement(['male','female']),
        ];
    }
}

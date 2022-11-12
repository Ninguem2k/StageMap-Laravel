<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Api\Ordered>
 */
class OrderedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'deadline' => $this->faker->date,
            'predictions' => $this->faker->date,
            'priority' => $this->faker->randomElement(['baixa', 'normal', 'alta']),
            'description' => $this->faker->text,
            'user_id' => $this->faker->numberBetween(1, 10),
            'client_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

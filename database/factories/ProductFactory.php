<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(0, 100),
            'size' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->catchPhrase,
            'ordered_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ordered_Image>
 */
class OrderedImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl,
            'title' => $this->faker->name,
            'ordered_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

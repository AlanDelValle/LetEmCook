<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cook>
 */
class CookFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cook_description' => $this->faker->paragraph(),
            'bio' => $this->faker->word(),
            'cook_thumbnail_url' => $this->faker->imageUrl(640, 480),
        ];
    }
}
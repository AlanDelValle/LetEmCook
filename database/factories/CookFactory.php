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
            'bio' => $this->faker->name(),
            'cook_thumbnail_url' => 'null',
        ];
    }
}
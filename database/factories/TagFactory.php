<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'tag_thumbnail_url' => 'null',
        ];
    }
}
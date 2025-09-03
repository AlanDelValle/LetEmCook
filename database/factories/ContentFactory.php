<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->word(),
            'video_duration_seconds' => $this->faker->numberBetween(50, 50000),
            'video_thumbnail_url' => $this->faker->imageUrl(640, 480),
            'video_thumbnail_previews_url' => json_encode([$this->faker->imageUrl(320, 240)]),
            'video_embed_url' => $this->faker->url(),
        ];
    }
}
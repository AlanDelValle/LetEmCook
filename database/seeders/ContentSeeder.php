<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run()
    {
        // Create cooks
        $cooks = Cook::factory()->count(5)->create();
        
        // Create categories
        $categories = Category::factory()->count(5)->create();
        
        // Create tags
        $tags = Tag::factory()->count(10)->create();
        
        // Create content and attach relationships
        Content::factory()->count(10)->create()->each(function ($content) use ($cooks, $categories, $tags) {
            $content->cooks()->attach($cooks->random(rand(1, 3)));
            $content->categories()->attach($categories->random(rand(1, 2)));
            $content->tags()->attach($tags->random(rand(2, 5)));
        });
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory(),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? \App\Models\Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
            'image' => null,
        ];
    }
}

?>
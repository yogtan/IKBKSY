<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'author' => $this->faker->name(),
            'publication' => $this->faker->dateTime(),
            'image' => $this->faker->imageUrl(360, 360, 'animals', true),
            'description' => $this->faker->paragraph(1),
            'id_category' => Category::factory(),
        ];
    }
}

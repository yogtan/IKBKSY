<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\members>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $faker = Faker\Factory::create();

        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(360, 360, 'animals', true),
            'position' => $this->faker->words(1, true),
            'id_department' => Department::factory(),
        ];
    }
}

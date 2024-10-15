<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValues = ['comedy', 'horror', 'thriller', 'fantasy', 'drama'];
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'link' => $this->faker->url,
            'genre' => $this->faker->randomElement($arrayValues),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=> $this->faker->sentence,
            "user_id"=>rand(1,10),
            "category_id"=>rand(1,10),
            "thumbnail"=>"/images/p-".rand(1,5).".jpg",
            "body"=> $this->faker->paragraph(20, true),
        ];
    }
}

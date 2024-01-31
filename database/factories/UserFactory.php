<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> $this->faker->name,
            "email"=> $this->faker->safeEmail,
            "username"=> $this->faker->unique->userName,
            "avatar"=> 'avatars/'.rand(1,10).".jpg",
            "role"=> 'author',
            "password"=> bcrypt($this->faker->unique->password),
        ];
    }
}

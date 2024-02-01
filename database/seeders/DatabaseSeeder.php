<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(9)->create();
        User::factory()->create([
            'username'=>"alisamtia",
            'email'=>'alisamtia1@gmail.com',
            'password'=>"12345678",
            'role'=>'admin'
        ]);

        User::factory()->create([
            'username'=>"NormalUser",
            'email'=>'heythere@gmail.com',
            'password'=>"xg7dZ8Cgs2F#Q9b",
            'role'=>'author'
        ]);

        Category::factory(10)->create();
        Post::factory(10)->create();
        Post::factory(6)->create([
            'user_id'=>10
        ]);
    }
}

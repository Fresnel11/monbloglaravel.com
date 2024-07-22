<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'tittle' => fake()->sentence(10),
                'body' =>fake()->paragraph(),
                'image' =>"public/images/town.jpg",
                'user_id' => 1,
            ];
        
    }
}

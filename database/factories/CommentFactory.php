<?php

namespace Database\Factories;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $factory = Comment::class;
    public function definition()
    {
            return [
                'comment' => $this->faker->sentence(),
                'post_id' => rand(1, 50),
                'user_id' => rand(1, 50),
                'deleted_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
                'created_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
                'updated_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            ];
    }
}
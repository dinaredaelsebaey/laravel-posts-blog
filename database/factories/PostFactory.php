<?php

namespace Database\Factories;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'title' => $this->faker->sentence(),
                'content' => $this->faker->paragraph(),
                'auther' => $this->faker->name(),
                'img' => $this->faker->imageUrl($width = 200, $height = 200),
                'deleted_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
                'created_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
                'updated_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
<?php

namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }
    public function run()
    {

        DB::table('comments')->insert([
            'comment' => 'seeder comment',
            'post_id' => rand(1, 50),
            'user_id' => rand(1, 50),
            'deleted_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
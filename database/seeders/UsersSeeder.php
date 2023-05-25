<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;
class UsersSeeder extends Seeder
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

        User::factory(50)->create();
        // DB::table('users')->insert([
        //     'name' => 'seeder user',
        //     'email' => 'seeder email',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'user_id' => rand(1, 50),
        //     'deleted_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

       
    }
}
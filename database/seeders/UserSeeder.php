<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,50) as $index) {

            DB::table('users')->insert([
                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'email_verified_at' => null,
                'password' => Hash::make($faker->password),
                'role_id' => rand(1,4),
                'remember_token' => Str::random(10)

            ]);

        }



    }
}

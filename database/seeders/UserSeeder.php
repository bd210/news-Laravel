<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

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
        $roles = collect(Role::all()->modelKeys());

        foreach (range(1,50) as $index) {

            DB::table('users')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'email_verified_at' => null,
                'password' => Hash::make($faker->password),
                'role_id' => $roles->random(),
                'remember_token' => null

            ]);

        }



    }
}

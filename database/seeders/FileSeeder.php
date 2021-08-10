<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,50 ) as $index) {

            DB::table('files')->insert([
                'file_name' => $faker->image('public/assets/upload/', 640, 480, null, false)
            ]);
        }

    }
}

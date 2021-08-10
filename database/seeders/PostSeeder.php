<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $categories = collect(Category::all()->modelKeys());
        $users = collect(User::all()->modelKeys());


        foreach (range(1, 50 ) as $index) {

            DB::table('posts')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'title' => $faker->name,
                'content' => $faker->text,
                'author_id' => $users->random(),
                'approved_by' => $users->random(),
                'edited_by' => null,
                'category_id' => $categories->random()


            ]);


        }

    }
}

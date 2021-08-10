<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $posts = collect(Post::all()->modelKeys());
        $usersId = collect(User::all()->modelKeys());


        foreach (range(1,300) as  $index ) {

            DB::table('comments')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'email' => $faker->email,
                'content' => $faker->text(150),
                'approved_comm' => $usersId->random(),
                'post_id' => $posts->random()
            ]);
        }
    }
}

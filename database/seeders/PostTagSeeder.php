<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts = collect(Post::all()->modelKeys());
        $tags = collect(Tag::all()->modelKeys());

        foreach (range(1,50) as $index) {

            DB::table('post_tags')->insert([

                'post_id' => $posts->random(),
                'tag_id' => $tags->random()

            ]);
        }


    }
}

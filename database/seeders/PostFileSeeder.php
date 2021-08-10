<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts = collect(Post::all()->modelKeys());
        $files = collect(File::all()->modelKeys());

        foreach (range(1, 50) as $index) {

            DB::table('post_files')->insert([

                'post_id' => $posts->random(),
                'file_id' => $files->random()

            ]);

        }

    }
}

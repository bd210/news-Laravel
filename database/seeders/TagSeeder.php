<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $tags = ['FK', 'KK', 'Football', 'Basketball', 'Fun', 'Politic', 'Health', 'Sport', 'Business', 'World'];

    public function run()
    {
        foreach ($this->tags as $tag) {

            DB::table('tags')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'keyword' => $tag
            ]);

        }
    }
}

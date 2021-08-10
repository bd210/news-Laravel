<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $words = ['mrs', 'majmun', 'debil', 'retard', 'govno'];

    public function run()
    {

        foreach ($this->words as $word ) {

            DB::table('bad_words')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'word' => $word

            ]);

        }

    }
}

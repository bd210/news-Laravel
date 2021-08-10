<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $categories = ['Sport', 'Politic', 'World', 'Fun', 'Health', 'Business'];
    public function run()
    {

       for ($i = 0; $i < count($this->categories); $i++) {

           DB::table('categories')->insert([
               'category_name' => $this->categories[$i],
               'created_at' => date("Y-m-d H:i:s")
           ]);

       }

    }
}

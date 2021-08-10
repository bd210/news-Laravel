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

       foreach ($this->categories as $category) {

           DB::table('categories')->insert([
               'created_at' => date('Y-m-d H:i:s') ,
               'updated_at' => date('Y-m-d H:i:s') ,
               'category_name' => $category
           ]);

       }

    }
}

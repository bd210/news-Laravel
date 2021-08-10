<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $roles = ['Admin', 'User', 'Operator', 'Editor'];

    public function run()
    {

        for ($i = 0; $i<count($this->roles); $i++) {

            DB::table('roles')->insert([
                'role_name' => $this->roles[$i],
                'created_at' => date("Y-m-d H:i:s")
            ]);

        }

    }
}

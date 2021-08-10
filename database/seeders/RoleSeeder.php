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

        foreach ($this->roles as $role) {

            DB::table('roles')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'role_name' => $role

            ]);

        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = collect(Permission::all()->modelKeys());
        $roles = collect(Role::all()->modelKeys());


        foreach (range(1, 50) as $index) {


            DB::table('permission_roles')->insert([

                'permission_id' => $permissions->random(),
                'role_id' => $roles->random()

            ]);

        }


    }
}

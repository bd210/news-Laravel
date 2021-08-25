<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BadWordSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FileSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(PostTagSeeder::class);
        $this->call(PostFileSeeder::class);
        $this->call(CommentSeeder::class);
    }
}

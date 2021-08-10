<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    private $permissions = [
      [
          "name" => "create-post",
          "description" => "This permission can create posts."
      ],
      [
        "name" => "delete-post",
        "description" => "This permission can delete posts."
      ],
      [
          "name" => "update-post",
        "description" => "This permission can update posts."
      ],
      [
          "name" => "approve-post",
        "description" => "This permission can approve posts."
      ],
      [
          "name" => "create-user",
        "description" => "This permission can create user."
      ],
      [
          "name" => "delete-user",
        "description" => "This permission can delete user."
      ],
      [
          "name" => "update-user",
        "description" => "This permission can update user."
      ],
      [
          "name" => "create-role",
        "description" => "This permission can create role."
      ],
      [
          "name" => "delete-role",
        "description" => "This permission can delete role."
      ],
      [
          "name" => "update-role",
        "description" => "This permission can update role."
      ],
      [
          "name" => "create-tag",
        "description" => "This permission can create tag."
      ],
      [
          "name" => "delete-tag",
        "description" => "This permission can delete tag."
      ],
      [
          "name" => "update-tag",
        "description" => "This permission can update tag."
      ],
      [
          "name" => "create-category",
        "description" => "This permission can create category."
      ],

      [
          "name" => "delete-category",
        "description" => "This permission can delete category."
      ],

      [
          "name" => "update-category",
        "description" => "This permission can update category."
      ],
      [
          "name" => "create-forbidden-word",
        "description" => "This permission can create forbidden word."
      ],
      [
          "name" => "delete-forbidden-word",
        "description" => "This permission can delete forbidden word."
      ],
      [
          "name" => "update-forbidden-word",
        "description" => "This permission can update forbidden word."
      ],
      [
          "name" => "create-permission",
        "description" => "This permission can create permission."
      ],
      [
          "name" => "delete-permission",
        "description" => "This permission can delete permission."
      ],
      [
          "name" => "update-permission",
        "description" => "This permission can update permission."
      ],
      [
          "name" => "update-permission-role",
        "description" => "This permission can update permission role."
      ],
      [
          "name" => "delete-comment",
        "description" => "This permission can delete comment."
      ],
      [
          "name" => "delete-file",
        "description" => "This permission can delete file."
      ]

    ];


    public function run()
    {

        foreach ($this->permissions as $permission) {

            DB::table('permissions')->insert([

                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') ,
                'name' => $permission['name'],
                'description' => $permission['description']
            ]);

        }

    }
}

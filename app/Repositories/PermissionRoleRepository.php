<?php


namespace App\Repositories;


use App\Models\PermissionRole;
use App\Models\Role;

class PermissionRoleRepository
{

    public function allPermissionForRole($id)
    {
        return Role::query()
            ->join('permission_roles', 'permission_roles.role_id', '=', 'roles.id')
            ->join('permissions', 'permission_id', '=', 'permissions.id')
            ->where('roles.id', $id)
            ->get();

    }


    public function update($request)
    {

        $roleID = $request->input('role_name');
        $permissionID = $request->input('chbPermission');

        PermissionRole::query()
            ->where('role_id', $roleID)
            ->delete();

        if (isset($permissionID)) {

            foreach ($permissionID as $value) {

                PermissionRole::query()
                    ->insert([
                        'role_id' => $roleID ,
                        'permission_id' => $value,
                    ]);
            }
        }


        return true;
    }

}

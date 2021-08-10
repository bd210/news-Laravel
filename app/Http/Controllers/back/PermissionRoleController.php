<?php

namespace App\Http\Controllers\back;


use App\Http\Requests\PermissionRole\PermissionRoleUpdateRequest;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class PermissionRoleController extends BackendController
{

    public function index($id = null)
    {

        $permission = new Permission();
        $role = new Role();

        $this->data['permissions'] = $permission::all();
        $this->data['roles'] = $role::all();
        $this->data['pmr'] = new Permission();

       if ($id) {

           $this->data['permissionRoles'] = $role::query()
               ->join('permission_roles', 'permission_roles.role_id', '=', 'roles.id')
               ->join('permissions', 'permission_id', '=', 'permissions.id')
               ->where('roles.id', $id)
               ->get();
       }

        return view('pages.back.permission_roles.all_permission_roles', $this->data);

    }


    public function show($id)
    {
        if ($id) {

            $permission = new Permission();
            $role = new Role();

            $this->data['permissions'] = $permission::all();
            $this->data['roles'] = $role::all();
            $this->data['pmr'] = new Permission();

            $this->data['permissionRoles'] = $role::query()
                ->join('permission_roles', 'permission_roles.role_id', '=', 'roles.id')
                ->join('permissions', 'permission_id', '=', 'permissions.id')
                ->where('roles.id', $id)
                ->get();


            return view('pages.back.permission_roles.all_permission_roles', $this->data);

        } else {

            return $this->return404();

        }
    }



    public function update(PermissionRoleUpdateRequest $request)
    {
        try {

            if ($request->exists('submitPermissionRole')) {

                $rolePermission = new PermissionRole();


                $roleID = $request->input('role_name');
                $permissionID = $request->input('chbPermission');


                $rolePermission::query()
                    ->where('role_id', $roleID)
                    ->delete();

               if (isset($permissionID)) {

                   foreach ($permissionID as $value) {

                       $rolePermission::query()
                           ->insert([
                               'role_id' => $roleID ,
                               'permission_id' => $value,
                           ]);
                   }
               }

                return  redirect()->back();


            } else {

                return  $this->return403();

            }


        } catch (QueryException $e) {

            Log::error("ERROR WITH QUERY : " . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error("ERROR : " . $e->getMessage());
            return $this->return500();
        }
    }


}

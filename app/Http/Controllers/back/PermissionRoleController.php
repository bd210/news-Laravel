<?php

namespace App\Http\Controllers\back;


use App\Http\Requests\PermissionRole\PermissionRoleUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionRoleRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class PermissionRoleController extends BackendController
{


    protected $permissionRole;

    public function __construct( PermissionRoleRepository $permissionRole)
    {

        $this->permissionRole = $permissionRole;
    }

    public function index($id = null)
    {

        $this->data['permissions'] = Permission::all();
        $this->data['roles'] = Role::all();
        $this->data['pmr'] = new Permission();

       if ($id) {

           $this->data['permissionRoles'] = $this->permissionRole->allPermissionForRole($id);
       }

        return view('pages.back.permission_roles.all_permission_roles', $this->data);

    }


    public function show(Role $prID)
    {
        if ($prID) {

            $this->data['permissions'] = Permission::all();
            $this->data['roles'] = Role::all();
            $this->data['pmr'] = new Permission();

            $this->data['permissionRoles'] = $this->permissionRole->allPermissionForRole($prID->id);


            return view('pages.back.permission_roles.all_permission_roles', $this->data);

        } else {

            return $this->return404();

        }
    }



    public function update(PermissionRoleUpdateRequest $request)
    {
        try {

            if ($request->exists('submitPermissionRole')) {


                $result = $this->permissionRole->update($request);

                return ($result)
                    ? redirect()->back()
                    : $this->return500();


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

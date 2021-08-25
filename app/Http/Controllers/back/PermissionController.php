<?php
namespace App\Http\Controllers\back;

use App\Http\Requests\Permissions\PermissionCreateRequest;
use App\Http\Requests\Permissions\PermissionUpdateRequest;
use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PermissionController extends BackendController
{

    protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }


    public function index()
    {

        $this->data['permissions'] = $this->permission->all();

        return view('pages.back.permissions.all_permissions',  $this->data);

    }


    public function create()
    {

        $this->data['permission'] = new Permission();

        return view('pages.back.permissions.create' , $this->data);

    }



    public function store(PermissionCreateRequest $request)
    {

            try {

               $result =  $this->permission->store($request->validated());

               return ($result)
                   ? redirect()->route('allPermissions')->with('success', 'YOU HAVE SUCCESSFULLY CREATED PERMISSION')
                   : redirect()->back()->withInput();



            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }


    }


    public function edit(Permission $permissionID)
    {
        if ($permissionID) {

            $result = $this->data['permission'] = $this->permission->getById($permissionID->id);

            return ($result)
                ? view('pages.back.permissions.update', $this->data)
                : $this->return500();

        } else {

            return $this->return404();

        }
    }


    public function update(PermissionUpdateRequest $request, Permission $permissionID)
    {
            try {

                $result = $this->permission->update($permissionID->id, $request);

                return ($result)
                    ? redirect()->route('allPermissions')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED PERMISSION')
                    : $this->return500();


            } catch (QueryException $e) {

                Log::error('ERROR WITH QUERY : ' . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error('ERROR : ' . $e->getMessage());
                return  $this->return500();
            }


    }


    public function destroy(Permission $permissionID)
    {
        try {

            if ($permissionID){


                $result = $this->permission->destroy($permissionID->id);


                return  ($result)
                    ? redirect()->route('allPermissions')->with('success', 'YOU HAVE SUCCESSFULLY DELETED PERMISSION')
                    : $this->return500();

            } else {

                return $this->return404();

            }

        } catch (QueryException $e) {

            Log::error('ERROR WITH QUERY : ' . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error('ERROR : ' . $e->getMessage());
            return  $this->return500();
        }
    }

}

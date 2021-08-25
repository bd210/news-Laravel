<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class RoleController extends BackendController
{

    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }



    public function index()
    {


        $this->data['roles'] = $this->role->all();

        return view('pages.back.roles.all_roles', $this->data);

    }




    public function create()
    {

        $this->data['role'] = new Role();

        return view('pages.back.roles.create', $this->data);

    }




    public function store(RoleCreateRequest $request)
    {
        if ($request->exists('btnCreateRole')) {

            try {

                $result = $this->role->store($request->validated());

                return ($result)
                    ? redirect()->route('allRoles')->with('success', 'YOU HAVE SUCCESSFULLY CREATED ROLE')
                    : redirect()->back()->withInput();


            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }

        } else {

            return  $this->return403();

        }

    }



    public function edit(Role $roleID)
    {
        if ($roleID) {


            $result = $this->data['role'] = $this->role->getById($roleID->id);


            return ($result)
                ? view('pages.back.roles.update', $this->data)
                : $this->return500();


        } else {

            return $this->return404();

        }
    }



    public function update(RoleUpdateRequest $request, Role $roleID)
    {
        if ($request->exists('btnUpdateRole')) {

            try {


                $result = $this->role->update($roleID->id, $request);


                return ($result)
                    ? redirect(route('allRoles'))->with('success', 'YOU HAVE SUCCESSFULLY UPDATED ROLE')
                    : $this->return500();


            } catch (QueryException $e) {

                Log::error('ERROR WITH QUERY : ' . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error('ERROR : ' . $e->getMessage());
                return  $this->return500();
            }

        } else {

            return $this->return404();
        }
    }




    public function destroy(Role $roleID)
    {
        try {

            if ($roleID){


                $result = $this->role->destroy($roleID->id);


                return ($result)
                    ? redirect()->route('allRoles')->with('success', 'YOU HAVE SUCCESSFULLY DELETED ROLE')
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

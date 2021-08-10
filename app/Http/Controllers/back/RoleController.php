<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class RoleController extends BackendController
{


    public function index()
    {

        $role = new Role();

        $this->data['roles'] = $role::query()
            ->orderBy('created_at', 'DESC')
            ->get();

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

                $result = Role::create($request->all());

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



    public function edit($id)
    {
        if ($id) {

            $role = new Role();

            $this->data['role'] = $role::query()
                ->where('id', $id)
                ->firstOrFail();

            $result = $this->data['role'];


            return ($result)
                ? view('pages.back.roles.update', $this->data)
                : $this->return500();


        } else {

            return $this->return404();

        }
    }



    public function update(RoleUpdateRequest $request, $id)
    {
        if ($request->exists('btnUpdateRole')) {

            try {

                $role = Role::find($id);

                $role->role_name = $request->input('role_name');

                $result = $role->save();


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




    public function destroy($id)
    {
        try {

            if ($id){

                $role = new Role();

                $result = $role::query()
                    ->where('id', $id)
                    ->delete();


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

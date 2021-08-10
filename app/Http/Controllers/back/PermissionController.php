<?php
namespace App\Http\Controllers\back;

use App\Http\Requests\Permissions\PermissionCreateRequest;
use App\Http\Requests\Permissions\PermissionUpdateRequest;
use App\Models\Permission;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PermissionController extends BackendController
{

    public function index()
    {

        $permission = new Permission();

        $this->data['permissions'] = $permission::query()
            ->orderBy('created_at', 'DESC')
            ->get();


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


               $result =  Permission::create($request->validated());

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


    public function edit($id)
    {
        if ($id) {

            $permission = new Permission();

            $this->data['permission'] = $permission::query()
                ->where('id', $id)
                ->firstOrFail();

            $result = $this->data['permission'];


            return ($result)
                ? view('pages.back.permissions.update', $this->data)
                : $this->return500();

        } else {

            return $this->return404();

        }
    }


    public function update(PermissionUpdateRequest $request, $id)
    {
            try {

                $permission = Permission::find($id);

                $permission->name = $request->input('name');
                $permission->description  = $request->input('description');

                $result = $permission->save();

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


    public function destroy($id)
    {
        try {

            if ($id){

                $permission = new Permission();

                $result = $permission::query()
                    ->where('id', $id)
                    ->delete();


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

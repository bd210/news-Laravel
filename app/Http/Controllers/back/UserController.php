<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdatePasswordRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends BackendController
{


    public function index()
    {

        $user = new User();

        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;

        $this->data['users'] = $user::with('roles')
            ->orderBy('created_at', 'DESC')
            ->paginate($per_page);

        return view('pages.back.users.all_users', $this->data);

    }



    public function create()
    {

        $role = new Role();

        $this->data['roles'] = $role::all();
        $this->data['user'] = new User();

        return view('pages.back.users.create', $this->data);

    }



    public function store(UserCreateRequest $request)
    {

            try {

                $result = User::create($request->validated());


                return ($result)
                    ? redirect(route('allUsers'))->with('success', 'YOU HAVE SUCCESSFULLY CREATED USER')
                    : redirect()->back()->withInput();


            } catch (QueryException $e) {

                Log::error('ERROR WITH QUERY : ' . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {
                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }


    }



    public function edit($id)
    {
        if ($id) {

            $user = new User();
            $role = new Role();

            $this->data['roles'] = $role::all();

             $this->data['user'] = $user::with('roles')
                ->where('id', $id)
                ->firstOrFail();

             $result = $this->data['user'];


            return ($result)
                ? view('pages.back.users.update', $this->data)
                : $this->return404();


        } else {

            return  $this->return404();

        }
    }



    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $user = User::find($id);

            $user->first_name = $request->input('fname');
            $user->last_name = $request->input('lname');
            $user->email = $request->input('email');
            $user->role_id = $request->input('role');

            $result = $user->save();


            return ($result)
                ? redirect()->route('allUsers')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED USER')
                :  $this->return500();


        } catch (QueryException $e) {

            Log::error('ERROR WITH QUERY : ' . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error('ERROR : ' . $e->getMessage());
            return  $this->return500();
        }
    }



    public function updatePassword(UserUpdatePasswordRequest $request, $id)
    {

        try {

                $user = User::find($id);

                $user->password = Hash::make($request->input('pass'));

                $result = $user->save();

                return ($result)
                    ? redirect()->route('allUsers')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED USER')
                    :  $this->return500();


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

               $user = new User();

               $result = $user::query()
                   ->where('id', $id)
                   ->delete();


                return ($result)
                    ? redirect()->route('allUsers')->with('success', 'YOU HAVE SUCCESSFULLY DELETED USER')
                    :  $this->return500();


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

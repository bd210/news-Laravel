<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdatePasswordRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class UserController extends BackendController
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function index()
    {

        $this->data['users'] = $this->user->all();

        return view('pages.back.users.all_users', $this->data);

    }



    public function create()
    {

        $this->data['roles'] = Role::all();
        $this->data['user'] = new User();

        return view('pages.back.users.create', $this->data);

    }



    public function store(UserCreateRequest $request)
    {

            try {

                $result = $this->user->store($request->validated());


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



    public function edit(User $userID)
    {
        if ($userID) {

            $this->data['roles'] = Role::all();

            $result = $this->data['user'] = $this->user->getById($userID->id);


            return ($result)
                ? view('pages.back.users.update', $this->data)
                : $this->return404();


        } else {

            return  $this->return404();

        }
    }



    public function update(UserUpdateRequest $request, User $userID)
    {
        try {


            $result = $this->user->update($userID->id, $request);


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



    public function updatePassword(UserUpdatePasswordRequest $request, User $userID)
    {

        try {


                $result = $this->user->updatePassword($userID->id, $request);

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



    public function destroy(User $userID)
    {
        try {

            if ($userID){

               $result = $this->user->destroy($userID->id);


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

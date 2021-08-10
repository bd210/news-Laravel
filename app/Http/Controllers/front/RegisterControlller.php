<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\Users\UserCreateFronteRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class RegisterControlller extends FrontendController
{

    public function registerForm()
    {

        return view('auth.register');

    }


    public function register(UserCreateFronteRequest $request)
    {
        if ($request->exists('submitRegistration')) {

            try {

                $user = new User();


                $fname = $request->input('first_name');
                $lname = $request->input('last_name');
                $email = $request->input('email');
                $pass = $request->input('password');

                $result = $user::query()
                    ->create([
                        'first_name' => $fname,
                        'last_name' => $lname,
                        'email' => $email,
                        'password' => md5($pass),
                        'role_id' => 2,
                        'created_at' => date('Y-m-d H:i:s')

                    ]);



              return ($result)
                  ? redirect()->route('loginForm')
                  : redirect()->back()->withInput();


            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }

        } else {

            return $this->return403();
        }
    }

}

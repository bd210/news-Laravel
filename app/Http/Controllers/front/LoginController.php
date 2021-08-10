<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends FrontendController
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->exists('submitLogin')) {

            $user = new User();

            $email = $request->input('email');
            $pass = $request->input('password');


            $result = $user::with('roles', 'roles.permissions')
                ->where([
                    'email' => $email,
                    'password' => md5($pass)
                ])
                ->first();

            if ($result) {

                session()->put('user', $result);

              return ($result->roles->role_name == "User") ? redirect(route('index')) : redirect(route('allUsers'));

            } else {

                return redirect()->back()->with('unsuccess', 'EMAIL OR PASSWORD IS INCORRECT');
            }


        } else {

            return $this->return403();

        }
    }

    public function logout()
    {

        session()->forget('user');
        session()->flush();

        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends BackendController
{


    public function login(Request $request)
    {

        if ($request->exists('btnLogin')) {

            $user = new User();

            $email = $request->input('email');
            $pass = $request->input('pass');

            $result = $user::with('roles', 'roles.permissions')
                ->where([
                    'email' => $email,
                    'password' => md5($pass)
                ])
                ->where('role_id', '!=', 2)
                ->firstOrFail();


             if ($result) {

                $request->session()->put('user', $result);

                return redirect(route('allUsers'));

             } else {

                return redirect()->back()->with('unsuccess', 'LOGIN FAILED');
             }

        } else {

            return $this->return403();

        }

    }


    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}

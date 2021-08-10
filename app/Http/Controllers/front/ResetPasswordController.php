<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{

    public function forgotForm()
    {
        return view('auth.forgot-password');
    }
}

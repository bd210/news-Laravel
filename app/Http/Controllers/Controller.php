<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $data = [];

    public function return404()
    {
        return view('pages.errors.error_404');
    }


    public function return500()
    {
        return view('pages.errors.error_500');
    }

    public function return403()
    {
        return view('pages.errors.error_403');
    }


    public function returnFirstImg( $files = array())
    {

        $images = array('png', 'jpg', 'jpeg');


        foreach ($files as $file) {

            $ext = pathinfo($file->file_name, PATHINFO_EXTENSION);

            if (in_array($ext, $images)) {

                return  $file->file_name ;

            }

        }

    }

    public function upload($file = array())
    {

        $count = count($file);

        $directory = public_path("assets/upload/");

        for ($i = 0; $i< $count; $i++) {

            $fileName = time() . "_" . $file[$i]->getClientOriginalName();
            $file[$i]->move($directory, $fileName);

        }

    }


    public function getPermissions()
    {
        $permissions = auth()->user('roles.permissions')->roles->permissions;

        $array = array();

        foreach ($permissions  as $per) {

            array_push($array, $per->name);
        }

        return $array;

    }

}

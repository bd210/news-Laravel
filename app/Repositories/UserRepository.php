<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function all()
    {

        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;

        return User::with('roles')
            ->orderBy('created_at', 'DESC')
            ->simplePaginate($per_page);
    }


    public function getById($id)
    {

        return User::with('roles')
            ->where('id', $id)
            ->firstOrFail();

    }


    public function store(array $data)
    {
        return User::create($data);
    }

    public function update($id, $request)
    {

        $user = $this->getById($id);;

        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');

        return $user->save();

    }


    public function updatePassword($id, $request)
    {

        $user = $this->getById($id);

        $user->password = Hash::make($request->input('pass'));

        return  $user->save();
    }



    public function destroy($id)
    {

        return User::query()
            ->where('id', $id)
            ->delete();
    }
}

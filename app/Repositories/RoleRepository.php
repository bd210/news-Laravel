<?php


namespace App\Repositories;


use App\Models\Role;

class RoleRepository
{

   public function all()
   {
        return Role::query()
            ->orderBy('created_at', 'DESC')
            ->get();
   }


   public function getById($id)
   {

       return Role::find($id);

   }


   public function store(array $data)
   {
        return Role::create($data);
   }

   public function update($id, $request)
   {

       $role = $this->getById($id);

       $role->role_name = $request->input('role_name');

       return $role->save();

   }

   public function destroy($id)
   {

        return Role::query()
            ->where('id', $id)
            ->delete();
   }

}

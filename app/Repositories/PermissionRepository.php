<?php


namespace App\Repositories;




use App\Models\Permission;

class PermissionRepository
{


    public function all()
    {
        return Permission::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function getById($id)
    {

        return Permission::find($id);

    }


    public function store(array $data)
    {
        return Permission::create($data);
    }

    public function update($id, $request)
    {

        $permission = $this->getById($id);

        $permission->name = $request->input('name');
        $permission->description  = $request->input('description');

        return $permission->save();

    }

    public function destroy($id)
    {

        return Permission::query()
            ->where('id', $id)
            ->delete();
    }

}

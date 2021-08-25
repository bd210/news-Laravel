<?php


namespace App\Repositories;



use App\Models\Category;

class CategoryRespository
{

    public function all()
    {
        return Category::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function getById($id)
    {

        return Category::find($id);

    }


    public function store(array $data)
    {
        return Category::create($data);
    }

    public function update($id, $request)
    {

        $category = $this->getById($id);

        $category->category_name = $request->input('category');

        return $category->save();

    }

    public function destroy($id)
    {

        return Category::query()
            ->where('id', $id)
            ->delete();
    }

}

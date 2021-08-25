<?php


namespace App\Repositories;


use App\Models\Tag;

class TagRepository
{

    public function all()
    {
        return Tag::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function getById($id)
    {

        return Tag::find($id);

    }


    public function store(array $data)
    {
        return Tag::create($data);
    }

    public function update($id, $request)
    {

        $tag = $this->getById($id);

        $tag->keyword = $request->input('tag');

        return $tag->save();

    }

    public function destroy($id)
    {

        return Tag::query()
            ->where('id', $id)
            ->delete();
    }
}

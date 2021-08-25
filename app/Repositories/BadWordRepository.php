<?php


namespace App\Repositories;


use App\Models\BadWord;

class BadWordRepository
{

    public function all()
    {
        return BadWord::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function getById($id)
    {
        return BadWord::query()
            ->where('id', $id)
            ->firstOrFail();
    }



    public function store(array $data)
    {
        return BadWord::create($data);
    }



    public function update($id, $request)
    {
        $bad_word = $this->getById($id);

        $bad_word->word = $request->input('word');

        return $bad_word->save();
    }



    public function destroy($id)
    {
        return BadWord::query()
            ->where('id', $id)
            ->delete();
    }



}

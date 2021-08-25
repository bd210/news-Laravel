<?php


namespace App\Repositories;


use App\Models\Comment;

class CommentRepository
{

    public function all()
    {
        return Comment::all();
    }


    public function destroy($id)
    {
        return Comment::query()
            ->where('id', $id)
            ->delete();
    }

}

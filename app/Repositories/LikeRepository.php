<?php


namespace App\Repositories;


use App\Models\Like;

class LikeRepository
{


    public function like($id)
    {
        $like = new Like();

        $like->post_id = $id;
        $like->user_id = auth()->user()->id;

        return $like->save();

    }


    public function unlike($id)
    {

        return Like::query()
            ->where([
                'post_id' => $id,
                'user_id' => auth()->user()->id
            ])
            ->delete();

    }

}

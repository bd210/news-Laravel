<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{

    public function creating(Post $post)
    {

        if (auth()->check())
         $post->author_id = auth()->user()->id;
    }


}

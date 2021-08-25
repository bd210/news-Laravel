<?php


namespace App\Repositories;


use App\Http\Controllers\Controller;
use App\Http\Requests\Files\FileUpdateRequest;
use App\Http\Requests\Posts\PostUpdateRequest;
use App\Models\File;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\PostTag;

class PostRepository
{

    public function all()
    {

        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;

        return Post::with(['categories', 'author', 'edited', 'files', 'approved'])
            ->where('approved_by', '!=', null)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate($per_page);
    }


    public function getById($id)
    {

        return Post::find($id);

    }


    public function store(array $data)
    {

        $controller = new Controller();

        $tags = request()->input('tag_id');
        $file = request()->file('file');

        $controller->upload($file);

        $post = Post::create($data);

        foreach ($file as $src) {

            $fileInsert = File::query()
                ->insertGetId([
                    'file_name' => time() . "_" . $src->getClientOriginalName()
                ]);

            PostFile::query()->insert([
                'file_id' => $fileInsert,
                'post_id' => $post->id
            ]);

        }


        if (isset($tags)) {

            foreach ($tags as $tag) {

                PostTag::query()->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag
                ]);
            }

        }


        return true;

    }

    public function update($id, $request, $requestFile)
    {

        $files = $requestFile->file('file_name');
        $tag = $request->input('tag');
        $title = $request->input('title');

        $controller = new Controller();

        $post = $this->getById($id);

        $post->title = ($post->title != $title)
            ? $post->title = $title
            : $request->input('title');


        $post->content = request()->input('content');
        $post->category_id = request()->input('category_id');
        $post->edited_by = auth()->user()->id;

        $post->save();

        if ($requestFile->hasFile('file_name')) {

            $controller->upload($files);

            foreach ($files as $src) {

                $file_insert_id  = File::query()->insertGetId([
                    'file_name' => time() . "_" . $src->getClientOriginalName()
                ]);

                PostFile::query()->insert([
                    'post_id' => $id,
                    'file_id' => $file_insert_id
                ]);


            }
        }


        if (isset($tag)) {

            PostTag::query()
                ->where('post_id', $id)
                ->delete();

            foreach ($tag as $t) {

                PostTag::query()->insert([
                    'post_id' => $id,
                    'tag_id' => $t
                ]);
            }

        }


        return true;

    }

    public function destroy($id)
    {

        $postFiles = PostFile::query()
            ->where('post_id', $id)
            ->get();


        Post::query()
            ->where('id', $id)
            ->delete();


        if (count($postFiles) > 0) {

            foreach ($postFiles as $postId) {

                $files = File::query()
                    ->where('id', $postId->file_id)
                    ->firstOrFail();

                unlink('assets/upload/' . $files->file_name);

            }

        }


        return true;
    }


    public function getCountPostLikes($id)
    {
        return Like::query()
            ->where('post_id', $id)
            ->groupBy('post_id')
            ->orderBy('post_id')
            ->count('post_id');
    }


    public function getAllPostsForEdit($id)
    {
        return Post::with('categories', 'files', 'tags')
        ->where('id', $id)
        ->firstOrFail();
    }


    public function pending()
    {
        return Post::with('categories', 'files', 'author')
            ->where('approved_by', '=', null)
            ->orderBy('created_at', 'ASC')
            ->get();
    }



    public function approve($id)
    {

        $post = $this->getById($id);

        $post->approved_by = auth()->user()->id;

        return $post->save();
    }


    public function destroyFile($postID, $fileID)
    {
        $fileDelete = File::find($fileID);


        PostFile::query()
            ->where('post_id', $postID)
            ->where('file_id', $fileID)
            ->delete();

        unlink('assets/upload/' . $fileDelete->file_name);

        return true;
    }

}

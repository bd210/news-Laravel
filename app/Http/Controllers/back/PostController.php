<?php
namespace App\Http\Controllers\back;


use App\Http\Requests\Files\FileUpdateRequest;
use App\Http\Requests\Posts\PostCreateRequest;
use App\Http\Requests\Posts\PostUpdateRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PostController extends BackendController
{

    public function index()
    {

        $post = new Post();

        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;

        $this->data['posts'] = $post::with('categories', 'author', 'edited', 'files', 'approved')
            ->where('approved_by', '!=', null)
            ->orderBy('created_at', 'DESC')
            ->paginate($per_page);


       $this->data['firstImg'] = $this->returnFirstImg($this->data['posts']);


        return view('pages.back.posts.all_posts', $this->data);

    }



    public function create()
    {

        $tag = new Tag();
        $category = new Category();

        $this->data['tags'] = $tag::all();
        $this->data['categories'] = $category::all();
        $this->data['post'] = new Post();

        return view('pages.back.posts.create', $this->data);

    }



    public function store(PostCreateRequest $request)
    {

        if ($request->exists('btnCreatePost')) {

            try {


                $postFile = new PostFile();
                $postTag = new PostTag();
                $fileModel = new File();


                $tags = $request->input('tag_id');
                $file = $request->file('file');

                $this->upload($file);

                $post = Post::create($request->validated());


                foreach ($file as $src) {

                    $fileInsert = $fileModel::query()
                        ->insertGetId([
                            'file_name' => time() . "_" . $src->getClientOriginalName()
                        ]);

                    $postFile::query()->insert([
                        'file_id' => $fileInsert,
                        'post_id' => $post->id
                    ]);

                }


                if (isset($tags)) {

                    foreach ($tags as $tag) {

                        $postTag::query()->insert([
                            'post_id' => $post->id,
                            'tag_id' => $tag
                        ]);
                    }

                }

                return redirect(route('pendingPosts'));


            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (FileException $e) {

                Log::error("ERROR WITH UPLOAD FILE : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }

        } else {

            return $this->return403();

        }

    }



    public function edit($id)
    {
        if ($id) {

            $post = new Post();
            $like = new Like();
            $category = new Category();
            $tag = new Tag();


            $this->data['categories'] = $category::all();
            $this->data['tags'] = $tag::all();

            $this->data['likes'] = $like::query()
                ->where('post_id', $id)
                ->groupBy('post_id')
                ->orderBy('post_id')
                ->count('post_id');


            $this->data['post'] = $post::with('categories', 'files', 'tags')
                ->where('id', $id)
                ->firstOrFail();


            $this->data['firstImg'] = $this->returnFirstImg($this->data['post']['files']);


            $result = $this->data['post'];

            return ($result)
                ? view('pages.back.posts.update', $this->data)
                : $this->return500();

        } else {

            return $this->return404();

        }
    }


    public function update(PostUpdateRequest $request, FileUpdateRequest $requestFile, $id)
    {
        if ($request->exists('btnUpdatePost')) {

            try {

                $file = new File();
                $filePost = new PostFile();
                $tagPost = new PostTag();

                $files = $requestFile->file('file_name');
                $tag = $request->input('tag');
                $title = $request->input('title');


                $post = Post::find($id);


                $post->title = ($post->title != $title)
                    ? $post->title = $title
                    : $request->input('title');


                $post->content = $request->input('content');
                $post->category_id = $request->input('category_id');
                $post->edited_by = auth()->user()->id;

                $result = $post->save();


                if ($requestFile->hasFile('file_name')) {

                    $this->upload($files);

                    foreach ($files as $src) {

                      $file_insert_id  = $file::query()->insertGetId([
                            'file_name' => time() . "_" . $src->getClientOriginalName()
                        ]);

                        $filePost::query()->insert([
                            'post_id' => $id,
                            'file_id' => $file_insert_id
                        ]);


                    }
                }

                if (isset($tag)) {

                    $tagPost::query()
                        ->where('post_id', $id)
                        ->delete();

                    foreach ($tag as $t) {

                        $tagPost::query()->insert([
                            'post_id' => $id,
                            'tag_id' => $t
                        ]);
                    }

                }


                return ($result)
                    ? redirect()->route('allPosts')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED POST')
                    : redirect()->back()->withInput();




            } catch (QueryException $e) {

                Log::error('ERROR WITH QUERY : ' . $e->getMessage());
                return $this->return500();

            } catch (FileException $e) {

                Log::error("ERROR WITH UPLOAD FILE : " . $e->getMessage());
                return $this->return500();


            } catch (\Exception $e) {

                Log::error('ERROR : ' . $e->getMessage());
                return  $this->return500();
            }

        } else {

            return $this->return403();

        }
    }


    public function destroy($id)
    {
        try {

            if ($id){

                $post = new Post();
                $postFile = new PostFile();
                $file = new File();


                $postFiles = $postFile::query()
                    ->where('post_id', $id)
                    ->get();

                $result = $post::query()
                    ->where('id', $id)
                    ->delete();


                if (count($postFiles) > 0) {

                    foreach ($postFiles as $postId) {

                        $files = $file::query()
                            ->where('id', $postId->file_id)
                            ->firstOrFail();

                        unlink('assets/upload/' . $files->file_name);

                    }

                }


                return ($result)
                    ? redirect(route('allPosts'))->with('success', 'YOU HAVE SUCCESSFULLY DELETED NEWS')
                    : $this->return500();

            }

        } catch (QueryException $e) {

            Log::error('ERROR WITH QUERY : ' . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error('ERROR : ' . $e->getMessage());
            return  $this->return500();
        }
    }




    public function pending()
    {

        $post = new Post();

        $this->data['pending'] = $post::with('categories', 'files', 'author')
            ->where('approved_by', '=', null)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('pages.back.posts.pending', $this->data);

    }




    public function approve($id)
    {

        try {

            if ($id) {

                $post = Post::find($id);

                $post->approved_by = auth()->user()->id;

                $result = $post->save();

                return ($result)
                    ? redirect()->route('allPosts')->with('success', 'YOU HAVE SUCCESSFULLY APPROVED POST')
                    : $this->return500();

            }


        } catch (QueryException $e) {

            Log::error('ERROR WITH QUERY : ' . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error('ERROR : ' . $e->getMessage());
            return  $this->return500();
        }

    }


    public function destroyFile($postID, $fileID)
    {

        try {

            if ($postID && $fileID){

                $postFile = new PostFile();

                $fileDelete = File::find($fileID);


                $result = $postFile::query()
                    ->where('post_id', $postID)
                    ->where('file_id', $fileID)
                    ->delete();

                unlink('assets/upload/' . $fileDelete->file_name);



                return ($result)
                    ? redirect()->back()
                    : $this->return500();

            }

        } catch (QueryException $e) {

            Log::error('ERROR WITH QUERY : ' . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error('ERROR : ' . $e->getMessage());
            return  $this->return500();
        }

    }


}

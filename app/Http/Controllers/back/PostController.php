<?php
namespace App\Http\Controllers\back;


use App\Http\Requests\Files\FileUpdateRequest;
use App\Http\Requests\Posts\PostCreateRequest;
use App\Http\Requests\Posts\PostUpdateRequest;
use App\Models\File;
use App\Models\Post;
use App\Repositories\CategoryRespository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PostController extends BackendController
{

    protected $post;
    protected $tag;
    protected $category;

    public function __construct(PostRepository $post, TagRepository $tag, CategoryRespository $category)
    {
        $this->post = $post;
        $this->tag = $tag;
        $this->category = $category;
    }


    public function index()
    {

        $this->data['posts'] = $this->post->all();

        $this->data['firstImg'] = $this->returnFirstImg($this->data['posts']);


        return view('pages.back.posts.all_posts', $this->data);

    }



    public function create()
    {

        $this->data['tags'] = $this->tag->all();
        $this->data['categories'] = $this->category->all();
        $this->data['post'] = new Post();

        return view('pages.back.posts.create', $this->data);

    }



    public function store(PostCreateRequest $request)
    {

        if ($request->exists('btnCreatePost')) {

            try {

               $result = $this->post->store($request->validated());

                return ($result)
                    ? redirect()->route('allPosts')
                    : $this->return500();


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



    public function edit(Post $postID)
    {
        if ($postID) {

            $this->data['categories'] = $this->category->all();
            $this->data['tags'] = $this->tag->all();

            $this->data['likes'] = $this->post->getCountPostLikes($postID->id);
            $result = $this->data['post'] = $this->post->getAllPostsForEdit($postID->id);
            $this->data['firstImg'] = $this->returnFirstImg($this->data['post']['files']);


            return ($result)
                ? view('pages.back.posts.update', $this->data)
                : $this->return500();

        } else {

            return $this->return404();

        }
    }


    public function update(Post $postID, PostUpdateRequest $request, FileUpdateRequest $requestFile)
    {

            try {

                $result = $this->post->update($postID->id, $request, $requestFile);

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


    }


    public function destroy(Post $postID)
    {
        try {

            if ($postID){

                $result = $this->post->destroy($postID->id);

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

        $this->data['pending'] = $this->post->pending();

        return view('pages.back.posts.pending', $this->data);

    }




    public function approve(Post $postID)
    {

        try {

            if ($postID) {

                $result =$this->post->approve($postID->id);

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


    public function destroyFile(Post $postID, File $fileID)
    {

        try {

            if ($postID && $fileID){

               $result = $this->post->destroyFile($postID->id, $fileID->id);

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

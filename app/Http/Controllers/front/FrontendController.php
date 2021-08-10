<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class FrontendController extends Controller
{




    public function __construct()
    {



        $this->data['categories'] = Category::all();

        $this->data['latestTrack'] = Post::with("categories")
            ->where('posts.approved_by', '!=', null )
            ->orderBy('posts.created_at', 'DESC')->limit(30)->get();


    }


    public function index()
    {

        $post = new Post();
        $category = new Category();


        $this->data['categories'] = $category::all();


        $this->data['all'] = $post::with('files')
            ->where('approved_by', '!=' , null)
            ->get();


        $this->data['latest'] = $post::with('categories')
            ->where('approved_by', '!=' , null)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();



        $this->data['business'] = $post::with('categories', 'files')
            ->where('approved_by', '!=' , null)
            ->where('category_id',  6)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();


        $this->data['sport'] = $post::with('categories', 'files')
            ->where('approved_by', '!=' , null)
            ->where('category_id',  1)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();


        $this->data['health'] = $post::with('categories', 'files')
            ->where('approved_by', '!=' , null)
            ->where('category_id',  5)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();


        $this->data['popular'] = $post::with('visits' , 'files')
            ->where('approved_by', '!=' , null)
            ->withCount('visits')
            ->orderBy('visits_count', 'DESC')
            ->limit(5)
            ->get();

        return view('pages.front.home', $this->data);
    }



    public function single($id)
    {
        if ($id) {

            try {

                $post = new Post();
                $comment = new Comment();
                $visit = new Visit();


                $this->data['single'] = $post::with("categories","files", "tags", "author", "approved", "edited", "likes")
                    ->where('posts.id', $id)
                    ->where('approved_by', '!=', null)
                    ->first();


                $this->data['comments'] = $comment::all()
                    ->where('approved_comm',true)
                    ->where('post_id', $id);


                $this->data['hits'] = $visit::with('posts')
                    ->where('post_id' ,$id)
                    ->groupBy('post_id')
                    ->orderBy('post_id')
                    ->count('post_id');


                $visit->visited_at = date("Y-m-d H:i:s");
                $visit->ip = $_SERVER['REMOTE_ADDR'];
                $visit->post_id = $id;

                $visit->save();


                return view('pages.front.single', $this->data);


            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }

        } else {

            return $this->return404();

        }

    }



    public function category($id)
    {

        if ($id)
        {

            $post = new Post();
            $categoryId = $id;


            $this->data['category'] = $post::with("categories")
                ->where('approved_by', '!=', null)
                ->where('category_id','=', $categoryId)
                ->get();


            return  view('pages.front.category', $this->data);

        } else {

            return $this->return404();
        }

    }





}

<?php
namespace App\Http\Controllers\back;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class BackendController extends Controller
{


    public function index()
    {

        return view('pages.back.home', $this->data);

    }

    public function search(Request $request)
    {

            if (isset($request['keyword'])) {


                $keyword = $request['keyword'];


                    $this->data['posts'] = Post::search($keyword)
                        ->get();

                    $this->data['users'] = User::search($keyword)
                        ->get();

                    $this->data['comments'] = Comment::search($keyword)
                        ->get();


                    $this->data['input'] = $keyword;

                return view('pages.back.searches.search', $this->data);

                } else {

                return $this->return404();

            }


    }


}

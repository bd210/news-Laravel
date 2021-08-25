<?php

namespace App\Http\Controllers\back;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CommentController extends BackendController
{


    protected $comment;

    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }


    public function index()
    {

        $this->data['comments'] = $this->comment->all();

        return view('pages.back.comments.all_comments', $this->data);

    }




    public function destroy(Comment $com)
    {
        try {

            if ($com){

                $result = $this->comment->destroy($com->id);


                return ($result)
                    ? redirect()->route('allComments')->with('success', 'YOU HAVE SUCCESSFULLY DELETED COMMENT')
                    : $this->return500();


            } else {

                return  $this->return404();
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

<?php

namespace App\Http\Controllers\back;

use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CommentController extends BackendController
{

    public function index()
    {

        $comment = new Comment();

        $this->data['comments'] = $comment::all();

        return view('pages.back.comments.all_comments', $this->data);

    }




    public function destroy($id)
    {
        try {

            if ($id){

                $comment = new Comment();

                $result = $comment::query()
                    ->where('id', $id)
                    ->delete();


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

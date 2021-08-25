<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\Comments\CommentCreateRequest;
use App\Http\Requests\Comments\CommentUpdateRequest;
use App\Mail\VerificationComment;
use App\Models\BadWord;
use App\Models\Comment;
use App\Models\Post;
use App\Models\VerifyComment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class CommentController extends FrontendController
{


    public function store(CommentCreateRequest $request, Post $postID)
    {
        try {


            if ($request->exists('submitComment')) {

                $comment = new Comment();
                $word = new BadWord();

                $badWords = $word::all();
                $badWordsArray = array();

                foreach ($badWords as $bw) {

                    array_push($badWordsArray, $bw->word);

                }

                $email = $request->input('email');
                $content = $request->input('content');

                $comment->email = $email;
                $comment->content = $this->badWord($badWordsArray, $content);

                $comment->created_at = date('Y-m-d H:i:s');
                $comment->post_id = $postID->id;

                $result = $comment->save();


                    if ($result) {

                        $verifyComment = new VerifyComment();

                        $to = $email;
                        $time = time() +3600;
                        $selector = bin2hex(random_bytes(8));


                        $verifyComment->email = $to;
                        $verifyComment->expired = date('Y-m-d H:i:s', $time);
                        $verifyComment->selector = $selector;

                        $resul2 = $verifyComment->save();


                        Mail::to($to)->send(new VerificationComment($request, $verifyComment->expired, $comment->id, $verifyComment->selector));



                        return ($resul2)
                            ? redirect()->back()->with('success', 'Check your mail for confirm comment')
                            : $this->return500();


                    } else {


                        return  redirect()->back()->with('unsuccess', 'An error occurred');

                    }


                } else {

                return $this->return403();

            }

        } catch (QueryException $e) {

            Log::error("ERROR WITH QUERY : " . $e->getMessage());
            return $this->return500();

        } catch (\Exception $e) {

            Log::error("ERROR : " . $e->getMessage());
            return $this->return500();
        }

    }


    public function edit(Comment $commentID, Post $postID)
    {

        if ($commentID && $postID) {

            $comment = new Comment();


            $this->data['comment'] = $comment::query()
                ->where('id', $commentID->id)
                ->first();

            session()->put('comment', $this->data['comment']);

            return  redirect()->route('singlePost', ['postID' => $postID->id]);

        } else {

            return $this->return404();

        }


    }

    public function update(CommentUpdateRequest $request, Comment $commentID, Post $postID)
    {

        if ($commentID && $postID) {

            try {

                $comment = new Comment();

                $date = date("Y-m-d H:i:s");
                $content = $request->input('content');


                $comment::query()
                    ->where('id', $commentID->id)
                    ->update([
                        'content' => $content,
                        'updated_at' => $date
                    ]);


                return  redirect(route('singlePost', ['postID' => $postID->id]));


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


    public function destroy(Comment $commentID, Post $postID)
    {

        if ($commentID && $postID) {

            try {

                $comment = new Comment();

                $comment::query()
                    ->where('id', $commentID->id)
                    ->delete();

                return  redirect()->route('singlePost', ['postID' => $postID->id ]);


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


    public function confirmCommentView(Comment $commentID)
    {

        if ($commentID) {


            $this->data['commentConfirm'] = Comment::find($commentID->id);


            return view('pages.front.comments.confirm', $this->data);

        } else {

            return $this->return404();

        }

    }


    public function confirm(Request $request, Comment $commentID, $selector)
    {

       if ($request->exists('submitCommentVerify')) {

           if ($commentID && $selector) {

            $now = date('Y-m-d H:i:s', time());

            $verify = new VerifyComment();
            $comment = new Comment();


               $vrf = $verify::query()
                   ->where('selector', '=', $selector)
                   ->where('expired', '>=', $now)
                   ->first();


               if ($vrf) {

                   $comment::query()
                       ->where('email', '=',$vrf->email)
                       ->where('id', $commentID->id)
                       ->update(['approved_comm' => 1]);


                   $verify::query()->where('id', '=', $vrf->id)->delete();


                   return  redirect()->back()->with('success', 'You are successfully confirmed comment');


               } else {

                   return  redirect()->back()->with('unsuccess', 'Session has expired or comment has already confirmed');
               }


           } else {

               return $this->return404();

           }

       } else {

           return  $this->return403();
       }

    }

    public function badWord($badWords,$data)
    {

        $replacements = array();

        foreach ($badWords as $or) {

            array_push($replacements, str_repeat("*",strlen($or)));
        }

        $data = str_ireplace($badWords, $replacements,$data);

        return $data;
    }

}

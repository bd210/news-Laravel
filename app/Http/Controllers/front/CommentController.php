<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\Comments\CommentCreateRequest;
use App\Http\Requests\Comments\CommentUpdateRequest;
use App\Mail\VerificationComment;
use App\Models\BadWord;
use App\Models\Comment;
use App\Models\VerifyComment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class CommentController extends FrontendController
{


    public function store(CommentCreateRequest $request, $id)
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
                $comment->post_id = $id;

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


    public function edit($commentID, $postID)
    {

        if ($commentID && $postID) {

            $comment = new Comment();


            $this->data['comment'] = $comment::query()
                ->where('id', $commentID)
                ->first();

            session()->put('comment', $this->data['comment']);

            return  redirect()->route('singlePost', ['id' => $postID]);

        } else {

            return $this->return404();

        }


    }

    public function update(CommentUpdateRequest $request, $commentID, $postID)
    {

        if ($commentID && $postID) {

            try {

                $comment = new Comment();

                $date = date("Y-m-d H:i:s");
                $content = $request->input('content');


                $comment::query()
                    ->where('id', $commentID)
                    ->update([
                        'content' => $content,
                        'updated_at' => $date
                    ]);


                return  redirect(route('singlePost', ['id' => $postID]));


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


    public function destroy($commentID, $postID)
    {

        if ($commentID && $postID) {

            try {

                $comment = new Comment();

                $comment::query()
                    ->where('id', $commentID)
                    ->delete();

                return  redirect()->route('singlePost', ['id' => $postID]);


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


    public function confirmCommentView($id)
    {

        if ($id) {


            $this->data['commentConfirm'] = Comment::find($id);


            return view('pages.front.comments.confirm', $this->data);

        } else {

            return $this->return404();

        }

    }


    public function confirm(Request $request, $id, $selector)
    {

       if ($request->exists('submitCommentVerify')) {

           if ($id && $selector) {

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
                       ->where('id', $id)
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

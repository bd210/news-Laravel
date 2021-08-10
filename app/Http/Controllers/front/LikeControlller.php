<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class LikeControlller extends Controller
{

    public function like($postID)
    {

        if ($postID) {

            try {

                $like = new Like();

                $like->post_id = $postID;
                $like->user_id = auth()->user()->id;

                $like->save();

                return redirect()->back();


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



    public function unlike($postID)
    {

        if ($postID) {

            try {

                $like = new Like();

                $like::query()
                    ->where([
                        'post_id' => $postID,
                        'user_id' => auth()->user()->id
                    ])
                    ->delete();

                return redirect()->back();


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



}

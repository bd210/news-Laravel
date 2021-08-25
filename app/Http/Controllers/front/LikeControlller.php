<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\LikeRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class LikeControlller extends Controller
{

    protected $like;

    public function __construct(LikeRepository $like)
    {
        $this->like = $like;
    }


    public function like(Post $postID)
    {

        if ($postID) {

            try {

                $result = $this->like->like($postID->id);

                return ($result)
                    ? redirect()->back()
                    : $this->return500();


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



    public function unlike(Post $postID)
    {


        if ($postID) {

            try {

                $result = $this->like->unlike($postID->id);

                return ($result)
                    ? redirect()->back()
                    : $this->return500();

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

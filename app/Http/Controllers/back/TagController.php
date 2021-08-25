<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Tags\TagCreateRequest;
use App\Http\Requests\Tags\TagUpdateRequest;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class TagController extends BackendController
{

    protected $tag;

    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {

        $this->data['tags'] = $this->tag->all();

        return view('pages.back.tags.all_tags', $this->data);

    }



    public function create()
    {

        $this->data['tag'] = new Tag();

        return view('pages.back.tags.create', $this->data);

    }




    public function store(TagCreateRequest $request)
    {
        if ($request->exists('btnCreateTag')) {

            try {

                $result = $this->tag->store($request->validated());

                return ($result)
                    ? redirect()->route('allTags')->with('success', 'YOU HAVE SUCCESSFULLY CREATED TAG')
                    : redirect()->back()->withInput();


            } catch (QueryException $e) {

                Log::error("ERROR WITH QUERY : " . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error("ERROR : " . $e->getMessage());
                return $this->return500();
            }
        } else {

            return  $this->return403();

        }
    }




    public function edit(Tag $tagID)
    {
        if ($tagID) {

            $result = $this->data['tag'] = $this->tag->getById($tagID->id);

            return ($result)
                ? view('pages.back.tags.update', $this->data)
                : $this->return404();


        } else {

            return $this->return404();

        }
    }




    public function update(TagUpdateRequest $request, Tag $tagID)
    {
        if ($request->exists('btnUpdateTag')) {

            try {

                $result = $this->tag->update($tagID->id, $request);

                return ($result)
                    ? redirect()->route('allTags')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED TAG')
                    : $this->return500();

            } catch (QueryException $e) {

                Log::error('ERROR WITH QUERY : ' . $e->getMessage());
                return $this->return500();

            } catch (\Exception $e) {

                Log::error('ERROR : ' . $e->getMessage());
                return  $this->return500();
            }

        } else {

            return $this->return404();
        }
    }



    public function destroy(Tag $tagID)
    {
        try {

            if ($tagID){

                $result = $this->tag->destroy($tagID->id);

                return ($result)
                    ? redirect(route('allTags'))->with('success', 'YOU HAVE SUCCESSFULLY DELETED TAG')
                    : $this->return500();

            } else {

                return $this->return404();
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

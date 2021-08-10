<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\Tags\TagCreateRequest;
use App\Http\Requests\Tags\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class TagController extends BackendController
{

    public function index()
    {

        $tag = new Tag();

        $this->data['tags'] = $tag::query()
            ->orderBy('created_at', 'DESC')
            ->get();

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

                $result = Tag::create($request->all());

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




    public function edit($id)
    {
        if ($id) {

            $tag = new Tag();

            $this->data['tag'] = $tag::query()
                ->where('id', $id)
                ->firstOrFail();

            $result = $this->data['tag'];


            return ($result)
                ? view('pages.back.tags.update', $this->data)
                : $this->return404();


        } else {

            return $this->return404();

        }
    }




    public function update(TagUpdateRequest $request, $id)
    {
        if ($request->exists('btnUpdateTag')) {

            try {

                $tag = Tag::find($id);

                $tag->keyword = $request->input('tag');

                $result = $tag->save();


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



    public function destroy($id)
    {
        try {

            if ($id){

                $tag = new Tag();

                $result = $tag::query()
                    ->where('id', $id)
                    ->delete();


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

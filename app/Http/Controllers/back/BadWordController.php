<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\BadWords\BadWordCreateRequest;
use App\Http\Requests\BadWords\BadWordUpdateRequest;
use App\Models\BadWord;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class BadWordController extends BackendController
{

    public function index()
    {
        $word = new BadWord();

        $this->data['words'] = $word::query()
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.back.bad_words.all_bad_words', $this->data);

    }


    public function create()
    {
        $this->data['word'] = new BadWord();

        return view('pages.back.bad_words.create', $this->data);

    }


    public function store(BadWordCreateRequest $request)
    {

        if ($request->exists('btnCreateBadWord')) {

            try {

                $result = BadWord::create($request->all());

                return ($result)
                    ? redirect()->route('allForbiddenWords')->with('success', 'YOU HAVE SUCCESSFULLY CREATED FORBIDDEN WORD')
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

            $word = new BadWord();
            $wordId = $id;

            $result = $this->data['oneWord'] = $word::query()
                ->where('id', $wordId)
                ->firstOrFail();


            return ($result) ? view('pages.back.bad_words.update', $this->data) : $this->return500();


        } else {

            return  $this->return404();

        }

    }


    public function update(BadWordUpdateRequest $request, $id)
    {
        if ($request->exists('btnUpdateBadWord')) {

            try {

                $bad_word = BadWord::find($id);

                $bad_word->word = $request->input('word');

                $result = $bad_word->save();

                return ($result)
                    ? redirect()->route('allForbiddenWords')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED FORBIDDEN WORD')
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

                $word = new BadWord();

                $result = $word::query()
                    ->where('id', $id)
                    ->delete();


                return ($result)
                    ? redirect(route('allForbiddenWords'))->with('success', 'YOU HAVE SUCCESSFULLY DELETED FORBIDDEN WORD')
                    : $this->return404();

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

<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\BadWords\BadWordCreateRequest;
use App\Http\Requests\BadWords\BadWordUpdateRequest;
use App\Models\BadWord;
use App\Repositories\BadWordRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class BadWordController extends BackendController
{

    protected $word;

    public function __construct(BadWordRepository $word)
    {
        $this->word = $word;
    }


    public function index()
    {

        $this->data['words'] = $this->word->all();

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

                $result = $this->word->store($request->validated());

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



    public function edit(BadWord $bw)
    {

        if ($bw->id) {


            $result = $this->data['oneWord'] = $this->word->getById($bw->id);


            return ($result)
                ? view('pages.back.bad_words.update', $this->data)
                : $this->return500();


        } else {

            return  $this->return404();

        }

    }


    public function update(BadWordUpdateRequest $request, BadWord $bw)
    {
        if ($request->exists('btnUpdateBadWord')) {

            try {


                $result = $this->word->update($bw->id, $request);


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


    public function destroy(BadWord $bw)
    {

        try {

            if ($bw){


                $result = $this->word->destroy($bw->id);


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

<?php
namespace App\Http\Controllers\back;

use App\Http\Requests\Categories\CategoryCreateRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRespository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CategoryController extends BackendController
{


    protected $category;

    public function __construct(CategoryRespository $category)
    {
        $this->category = $category;
    }

    public function index()
    {

        $this->data['categories'] = $this->category->all();

        return view('pages.back.categories.all_categories', $this->data);
    }


    public function create()
    {

        $this->data['category'] = new Category();

        return view('pages.back.categories.create', $this->data);

    }



    public function store(CategoryCreateRequest $request)
    {

        if ($request->has('btnCreateCategory')) {

            try {

                $result = $this->category->store($request->validated());

                return ($result)
                    ? redirect()->route('allCategories')->with('success', 'YOU HAVE SUCCESSFULLY CREATED CATEGORY')
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



    public function edit(Category $cat)
    {

        if ($cat) {

            $result = $this->data['category'] = $this->category->getById($cat->id);


            return ($result)
                ? view('pages.back.categories.update', $this->data)
                : $this->return500();


        } else {

            return $this->return404();

        }

    }


    public function update(CategoryUpdateRequest $request, Category $cat)
    {
        if ($request->exists('btnUpdateCategory')) {

            try {

               $result = $this->category->update($cat->id, $request);

                return ($result)
                    ? redirect()->route('allCategories')->with('success', 'YOU HAVE SUCCESSFULLY UPDATED CATEGORY')
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



    public function destroy(Category $cat)
    {
        try {

            if ($cat){


                $result = $this->category->destroy($cat->id);

                return ($result)
                    ? redirect()->route('allCategories')->with('success', 'YOU HAVE SUCCESSFULLY DELETED CATEGORY')
                    :  $this->return500();

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

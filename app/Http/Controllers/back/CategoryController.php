<?php
namespace App\Http\Controllers\back;

use App\Http\Requests\Categories\CategoryCreateRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CategoryController extends BackendController
{

    public function index()
    {
        $category = new Category();

        $this->data['categories'] = $category::query()
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.back.categories.all_categories', $this->data);
    }


    public function create()
    {

        $this->data['category'] = new Category();

        return view('pages.back.categories.create', $this->data);

    }



    public function store(CategoryCreateRequest $request)
    {

        if ($request->exists('btnCreateCategory')) {

            try {

                $result = Category::create($request->validated());

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



    public function edit($id)
    {

        if ($id) {

            $category = new Category();

            $this->data['category'] = $category::query()
                ->where('id', $id)
                ->firstOrFail();

            $result = $this->data['category'];


            return ($result)
                ? view('pages.back.categories.update', $this->data)
                : $this->return500();


        } else {

            return $this->return404();

        }

    }


    public function update(CategoryUpdateRequest $request, $id)
    {
        if ($request->exists('btnUpdateCategory')) {

            try {

               $category = Category::find($id);

               $category->category_name = $request->input('category');

               $result = $category->save();

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



    public function destroy($id)
    {
        try {

            if ($id){

                $category = new Category();

                $result = $category::query()
                    ->where('id', $id)
                    ->delete();


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

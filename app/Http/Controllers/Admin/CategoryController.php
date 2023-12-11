<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\CategoryTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CategoryTrait;
   public function index()

   {


       return view('dashboard.categories.index');
   }

    public function data()
    {

        return $this->DataAjax();
    }// end of data

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return response(['status'=>true,'message'=>__('general.created_successfully')]);
    }// end of store
    public function destroy(Category $category)
    {
        $category->delete();
        return response(['status'=>true,'message'=>__('general.deleted_successfully')]);
    }// end of destroy

    public function update(CategoryRequest  $request,Category $category)
    {



        $data = $request->validated();

        $category->update($data);
        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of update
    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $category = Category::find($recordId);

            if ($category->status === 'active'){


                $category->status = 'inactive';
            }else{

                $category->status = 'active';
            }

            $category->save();
        }

        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of status

    public function bulk_delete()
    {

        foreach (json_decode(request()->record_ids) as $recordId) {

           $Category = Category::FindOrFail($recordId);

            $Category->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete

}

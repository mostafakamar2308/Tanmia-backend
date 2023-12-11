<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Traits\NewsTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
    use UploadImageTrait;
    public function index()
    {

        $categories = Category::where('status','active')->get();

        return view('dashboard.news.index',compact('categories'));
    }

    public function data()
    {

        return $this->DataAjax();
    }// end of data

    public function store(NewsRequest $request)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
          $image= $this->uploadImage($request, 'news');
            foreach ($image as $key=>$value){
                $data[$key]= $value;
            }
        }

        News::create($data);
        return response(['status'=>true,'message'=>__('general.created_successfully')]);
    }// end of store

    public function destroy(News $news)
    {
        $this->deleteImage($news);
        $news->delete();
        return response(['status'=>true,'message'=>__('general.deleted_successfully')]);


    }// end of destroy

    public function update(NewsRequest  $request,News $news)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->updateImage($news);
            $image= $this->uploadImage($request, 'news');
            foreach ($image as $key=>$value){
                $data[$key]= $value;
            }
        }
        $news->update($data);
        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of update


    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $News = News::find($recordId);

            if ($News->status === 'active'){


                $News->status = 'inactive';
            }else{

                $News->status = 'active';
            }

            $News->save();
        }

        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of status
    public function bulk_delete()
    {

        foreach (json_decode(request()->record_ids) as $recordId) {

            $News = News::FindOrFail($recordId);
            $this->deleteImage($News);

            $News->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete

}

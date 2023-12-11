<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
        $news = News::where('status', 'active')->latest()->paginate(10);
        if ($news->count()==0){
            return response()->apiError(__('api.No_News_found'),1,404);
        }
        return response()->api(NewsResource::collection($news),__('api.success'),0,200);


    }

    public function news_category($id){
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
      $category =  Category::where('status','active')->find($id);
      if (!$category){
          return response()->apiError(__('api.no_category_found'),1,404);
      }
        $news = $category->news()->where('status','active')->latest()->paginate(10);
      if ($news->count()==0){
          return response()->apiError(__('api.no_found_news'),1,404);
      }
        return response()->api(NewsResource::collection($news),__('api.success'),0,200);

    }
    public function show($id){
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
        $news = News::where('status','active')->find($id);
        if (!$news){
            return response()->apiError(__('api.no_found_news'),1,404);
        }
        return response()->api(new NewsResource($news),__('api.success'),0,200);

    }
}

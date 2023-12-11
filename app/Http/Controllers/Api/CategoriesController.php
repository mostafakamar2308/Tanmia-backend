<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
      public function index(){
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);


        $categories = Category::where('status','active')->latest()->paginate(5);

        if ($categories->count() == 0) {
            return response()->apiError('No Data Found',1,404);}


        return response()->api(CategoriesResource::collection($categories),__('api.success'),0,200);
      }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);


        $videos = Video::where('status','active')->latest()->paginate(5);

        if ($videos->count() == 0) {
            return response()->apiError('No Data Found',1,404);}


        return response()->api(VideoResource::collection($videos),__('api.success'),0,200);
    }
}

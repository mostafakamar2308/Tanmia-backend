<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function index()
    {



        $sliders = Slider::where('status','active')->get();
        if($sliders->count() == 0)
        {
            return response()->apiError('No Data Found',1,404);
        }

        /// api macro is defined in AppServiceProvider.php
        /// api('data','message',error_code,'status_code')
        return response()->api(SliderResource::collection($sliders),__('api.success'),0,200);
    }

}

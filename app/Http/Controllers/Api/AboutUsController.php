<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
        $aboutUs = AboutUs::where('status', 'active')->first();
        if (!$aboutUs) {
            return response()->apiError(__('api.No_Data_Found'), 1, 404);
        }
        return response()->api(new AboutUsResource($aboutUs),__('api.success'), 0, 200);
    }
}

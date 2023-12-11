<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
        $setting = Setting::where('status', 'active')->first();
        if (!$setting) {
            return response()->apiError(__('api.No_Data_Found'), 1, 404);
        }
        return response()->api(new SettingsResource($setting),__('api.success'), 0, 200);
    }
}

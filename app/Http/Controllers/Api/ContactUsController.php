<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $lang = request()->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        app()->setLocale($lang);
        $contactUs = ContactUs::where('status', 'active')->first();
        if (!$contactUs) {
            return response()->apiError(__('api.No_Data_Found'), 1, 404);
        }
        return response()->api(new ContactUsResource($contactUs),__('api.success'), 0, 200);
    }
}

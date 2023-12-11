<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use App\Traits\SettingsTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use UploadImageTrait,SettingsTrait;
    public function index()
    {

        return view('dashboard.settings.index');
    }
    public function data()
    {
        return $this->DataAjax();
    }

    public function store(SettingsRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
           $image= $this->uploadImage($request, 'settings');
           foreach ($image as $key => $value) {
               $data[$key]=$value;
           }
        }
        Setting::create($data);

        return response(['status'=>true,'message'=>__('general.created_successfully')]);
    }

    public function update(SettingsRequest $request, Setting $setting)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->updateImage($setting);
            $image= $this->uploadImage($request, 'settings');
            foreach ($image as $key => $value) {
                $data[$key]=$value;
            }
        }
        $setting->update($data);
        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }

    public function destroy(Setting $setting)
    {
        $this->deleteImage($setting);
        $setting->delete();
        return response(['status'=>true,'message'=>__('general.deleted_successfully')]);
    }


    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $category = Setting::find($recordId);

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

            $Category = Setting::FindOrFail($recordId);
            $this->deleteImage($Category);

            $Category->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete
}

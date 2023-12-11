<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\SliderTrait;
use App\Traits\UploadImageSliderTrait;
use App\Traits\UploadImageSliderVideoTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use SliderTrait;
    use UploadImageSliderTrait;
    use UploadImageSliderVideoTrait;

   public function index()
   {


       return view('dashboard.sliders.index');
   }

   public function data(){
         return $this->DataAjax();
   }
   public function store(SliderRequest $request)
   {


       if ($request->hasFile('image')) {

           $image = $this->uploadImage($request, 'sliders');
           foreach ($image as $item) {
               Slider::create([
                   'image' => $item,
                   'type' => 'image',
               ]);
           }
       }

       if ($request->hasFile('video')) {

           $video = $this->uploadImageVideo($request, 'sliders');
           foreach ($video as $item) {
               Slider::create([
                   'video' => $item,
                     'type' => 'video',
               ]);
           }
       }



       return response(['status'=>true,'message'=>__('general.created_successfully')]);



   }

   public function destroy(Slider $slider)
   {
       $this->deleteImage($slider);
       $slider->delete();
       return response(['status'=>true,'message'=>__('general.deleted_successfully')]);
   }
   public function update(SliderRequest $request,Slider $slider)
   {



       if ($request->hasFile('image')) {

           $this->updateImage($slider);
           $image = $this->uploadImageSlider($request, 'sliders');

           foreach ($image as $item) {
               $slider->update([
                   'image' => $item,
               ]);
           }

       }
       if ($request->hasFile('video')) {

           $this->updateImageVideo($slider);
           $image = $this->uploadImageVideoSlider($request, 'sliders');
           foreach ($image as $item) {
               $slider->update([
                   'video' => $item,
               ]);
           }

       }
       return response(['status'=>true,'message'=>__('general.updated_successfully')]);
   }


    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $category = Slider::find($recordId);

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

            $Category = Slider::FindOrFail($recordId);
           $this->deleteImage($Category);
            $Category->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete
}

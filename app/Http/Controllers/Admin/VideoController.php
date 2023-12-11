<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Traits\UploadVideoTrait;
use App\Traits\VideosTrait;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use VideosTrait;
    use UploadVideoTrait;
   public function index()
   {
       return view('dashboard.video.index');
   }
   public function data(){
       return $this->DataAjax();
   }
   public function store(VideoRequest $request)
   {
       $data =$request->validated();
       if ($request->hasFile('video')){
              $video=$this->uploadImage($request,'videos');
                $data=array_merge($data,$video);

       }


           Video::create($data);
       return response(['status'=>true,'message'=>__('general.created_successfully')]);



   }
   public function destroy(Video $video)
   {
       $this->deleteImage($video);
       $video->delete();
       return response(['status'=>true,'message'=>__('general.deleted_successfully')]);
   }

   public function update(VideoRequest $request,Video $video)
   {
       $data =$request->validated();
       if ($request->hasFile('video')){
           $this->updateImage($video);
              $videos=$this->uploadImage($request,'videos');
           foreach ($videos as $key=>$value){
               $data[$key]= $value;
           }

       }


       $video->update($data);
       return response(['status'=>true,'message'=>__('general.updated_successfully')]);
   }

    public function status()
    {
         foreach (json_decode(request()->record_ids) as $recordId) {
              $video = Video::find($recordId);
              if ($video->status === 'active'){
                $video->status = 'inactive';
              }else{
                $video->status = 'active';
              }
              $video->save();
         }
         return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }

    public function bulk_delete()
    {
         foreach (json_decode(request()->record_ids) as $recordId) {
              $video = Video::find($recordId);
              $this->deleteImage($video);
              $video->delete();
         }
         return response(['status'=>true,'message'=>__('general.deleted_successfully')]);
    }



}

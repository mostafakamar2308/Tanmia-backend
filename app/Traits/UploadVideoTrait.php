<?php
namespace App\Traits;

use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

trait UploadVideoTrait
{
    //function search
    public array $test = [];

    public function uploadImage($request,$name): array
    {

        if ($request->hasFile('video')) {

            $fileName = date("YmdHims").'_'.$request->video->getClientOriginalName();

            $image= $request->file('video');

            $path = $image->storeAs($name, $fileName,['disk' => 'uploads']);


            $this->test['video']=$path;
        }



        return $this->test;
    }


    public function updateImage($model):void
    {

        if (request()->hasFile('video')) {


            if (File::exists('uploads/'. $model->video)) {


                unlink('uploads/'. $model->video);

            }

        }



    }
    public function deleteImage($model):void
    {

        if ($model->video != null) {

            //check if image exists
            if (File::exists('uploads/'. $model->video)) {
                //delete image
                unlink('uploads/'. $model->video);
            }
        }


    }


}

<?php
namespace App\Traits;

use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

trait UploadImageSliderVideoTrait
{
    //function search
    public array $test = [];

    public function uploadImageVideo($request,$name): array
    {

       foreach  ($request->video as $image) {

           $fileName = date("YmdHims").'_'.$image->getClientOriginalName();

           $path = $image->storeAs($name, $fileName,['disk' => 'uploads']);

           $this->test[]=$path;

       }

        return $this->test;




    }

    public function uploadImageVideoSlider($request,$name): array
    {

        $image = $request->video;
            $fileName = date("YmdHims").'_'.$image->getClientOriginalName();

            $path = $image->storeAs($name, $fileName,['disk' => 'uploads']);

            $this->test[]=$path;



        return $this->test;




    }


    public function updateImageVideo($model):void
    {
        if (request()->hasFile('video')) {


            if (File::exists('uploads/'. $model->video)) {


                unlink('uploads/'. $model->video);

            }

        }



    }
    public function deleteImageVideo($model):void
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

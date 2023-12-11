<?php
namespace App\Traits;

use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

trait UploadImageTrait
{
    //function search
    public array $test = [];

    public function uploadImage($request,$name): array
    {

        if ($request->hasFile('image')) {

            $fileName = date("YmdHims").'_'.$request->image->getClientOriginalName();

            $image= $request->file('image');

            $path = $image->storeAs($name, $fileName,['disk' => 'uploads']);


            $this->test['image']=$path;
        }



        return $this->test;
    }


    public function updateImage($model):void
    {

        if (request()->hasFile('image')) {


            if (File::exists('uploads/'. $model->image)) {


                unlink('uploads/'. $model->image);

            }

        }



    }
    public function deleteImage($model):void
    {

        if ($model->image != null) {

            //check if image exists
            if (File::exists('uploads/'. $model->image)) {
                //delete image
                unlink('uploads/'. $model->image);
            }
        }


    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Traits\AboutUsTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use AboutUsTrait;
    use UploadImageTrait;
    public function index()
    {
        return view('dashboard.aboutUS.index');
    }
    public function data(){
     return $this->DataAjax();
   }
   public function store(AboutUsRequest $request)
   {
         $data = $request->validated();
         if ($request->hasFile('image')) {
             $image= $this->uploadImage($request, 'aboutUs');
             foreach ($image as $key=>$value){
                 $data[$key]= $value;
             }
         }

       AboutUs::create($data);
       return response(['status'=>true,'message'=>__('general.created_successfully')]);
   }

    public function destroy($id)
    {
        $aboutUs= AboutUs::findOrFail($id);

        $this->deleteImage($aboutUs);
        $aboutUs->delete();
        return response(['status'=>true,'message'=>__('general.deleted_successfully')]);


    }// end of destroy

    public function update(AboutUsRequest  $request,$id)
    {
     $aboutUs= AboutUs::findOrFail($id);

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->updateImage($aboutUs);
            $image= $this->uploadImage($request, 'aboutUs');
            foreach ($image as $key=>$value){
                $data[$key]= $value;
            }
        }
        $aboutUs->update($data);
        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of update

    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $News = AboutUs::find($recordId);

            if ($News->status === 'active'){


                $News->status = 'inactive';
            }else{

                $News->status = 'active';
            }

            $News->save();
        }

        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }// end of status
    public function bulk_delete()
    {

        foreach (json_decode(request()->record_ids) as $recordId) {

            $News = AboutUs::FindOrFail($recordId);
            $this->deleteImage($News);

            $News->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete

}

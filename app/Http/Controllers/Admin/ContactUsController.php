<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Traits\ContactUsTrait;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    use ContactUsTrait;
    public function index()
    {

        return view('dashboard.contactUs.index');
    }
    public function data(){
        return $this->DataAjax();
    }
    public function store(ContactUsRequest $request)
    {

        $data = $request->validated();

        ContactUs::create($data);

        return response(['status'=>true,'message'=>__('general.created_successfully')]);
    }

    public function update(ContactUsRequest $request,$id)
    {
        $data = $request->validated();

        $contactUs = ContactUs::findOrFail($id);


        $contactUs->update($data);

        return response(['status'=>true,'message'=>__('general.updated_successfully')]);
    }
    public function destroy($id)
    {
        $aboutUs= ContactUs::findOrFail($id);

        $aboutUs->delete();
        return response(['status'=>true,'message'=>__('general.deleted_successfully')]);


    }// end of destroy


    public function status()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $News = ContactUs::find($recordId);

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

            $News = ContactUs::FindOrFail($recordId);


            $News->delete();
        }
        return response()->json(['success' => true, 'message' => __('general.deleted_successfully')]);
    }// end of bulk_delete
}

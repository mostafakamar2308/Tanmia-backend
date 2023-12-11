<?php
namespace App\Traits;

use App\Models\contactUs;


use Yajra\DataTables\DataTables;

trait ContactUsTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $contactUs = ContactUs::latest()->get();


      return DataTables::of($contactUs)
          ->addColumn('record_select', 'dashboard.contactUs.data_table.record_select')
          ->editColumn('status', function (contactUs $contactUs) {
              return view('dashboard.contactUs.data_table.status',compact('contactUs'));

          })




          ->editColumn('created_at', function (contactUs $contactUs) {
              return $contactUs->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (contactUs $contactUs){

              return view('dashboard.contactUs.data_table.actions',compact('contactUs'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

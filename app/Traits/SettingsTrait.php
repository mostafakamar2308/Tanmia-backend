<?php
namespace App\Traits;

use App\Models\settings;


use App\Models\Setting;
use Yajra\DataTables\DataTables;

trait SettingsTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $setting = Setting::latest()->get();


      return DataTables::of($setting)
          ->addColumn('record_select', 'dashboard.settings.data_table.record_select')
          ->editColumn('status', function (Setting $settings) {
              return view('dashboard.settings.data_table.status',compact('settings'));

          })
            ->editColumn('image', function (Setting $settings) {
                return view('dashboard.settings.data_table.image',compact('settings'));

            })



          ->editColumn('created_at', function (Setting $settings) {
              return $settings->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (Setting $settings){

              return view('dashboard.settings.data_table.actions',compact('settings'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

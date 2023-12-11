<?php
namespace App\Traits;

use App\Models\AboutUs;


use Yajra\DataTables\DataTables;

trait AboutUsTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $aboutUs = AboutUs::latest()->get();


      return DataTables::of($aboutUs)
          ->addColumn('record_select', 'dashboard.aboutUs.data_table.record_select')
          ->editColumn('status', function (AboutUs $aboutUs) {
              return view('dashboard.aboutUs.data_table.status',compact('aboutUs'));

          })
            ->editColumn('image', function (AboutUs $aboutUs) {
                return view('dashboard.aboutUs.data_table.image',compact('aboutUs'));

            })



          ->editColumn('created_at', function (AboutUs $aboutUs) {
              return $aboutUs->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (AboutUs $aboutUs){

              return view('dashboard.aboutUs.data_table.actions',compact('aboutUs'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

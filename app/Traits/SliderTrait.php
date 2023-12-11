<?php
namespace App\Traits;

use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

trait SliderTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $sliders = Slider::latest()->get();



      return DataTables::of($sliders)
          ->addColumn('record_select', 'dashboard.sliders.data_table.record_select')
          ->editColumn('status', function (Slider $slider) {
              return view('dashboard.sliders.data_table.status',compact('slider'));

          })
          ->editColumn('image', function (Slider $slider) {
              return view('dashboard.sliders.data_table.image',compact('slider'));

          })

          ->editColumn('created_at', function (Slider $slider) {
              return $slider->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (Slider $slider){
              return view('dashboard.sliders.data_table.actions',compact('slider'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

<?php
namespace App\Traits;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

trait VideosTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $video = Video::latest()->get();

      return DataTables::of($video)
          ->addColumn('record_select', 'dashboard.video.data_table.record_select')

          ->editColumn('status', function (Video $video) {
              return view('dashboard.video.data_table.status', compact('video'));
          })

          ->editColumn('video', function (Video $video) {
              return view('dashboard.video.data_table.video', compact('video'));
          })


          ->editColumn('created_at', function (Video $video) {
              return $video->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (Video $video){
              return view('dashboard.video.data_table.actions',compact('video'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

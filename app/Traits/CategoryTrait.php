<?php
namespace App\Traits;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

trait CategoryTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $admins = Category::latest()->withCount(['news']);


      return DataTables::of($admins)
          ->addColumn('record_select', 'dashboard.categories.data_table.record_select')
          ->editColumn('status', function (Category $category) {
              return view('dashboard.categories.data_table.status',compact('category'));

          })

          ->editColumn('created_at', function (Category $admin) {
              return $admin->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (Category $category){
              return view('dashboard.categories.data_table.actions',compact('category'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

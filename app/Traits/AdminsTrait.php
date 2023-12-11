<?php
namespace App\Traits;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

trait AdminsTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $admins = [
            'id' => 1,
          'name' => 'admin',
          'email' => 'sasad',
            'created_at' => '2021-09-09',
            'updated_at' => '2021-09-09',
            'status' => 'active',

  ];


      return DataTables::of($admins)
          ->addColumn('record_select', 'dashboard.admin.data_table.record_select')

->editColumn('name', function (User $admin) {
              return $admin->name;
          })
          ->editColumn('created_at', function (User $admin) {
              return $admin->created_at->format('Y-m-d');
          })
          ->addColumn('actions', 'dashboard.admin.data_table.actions')
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}

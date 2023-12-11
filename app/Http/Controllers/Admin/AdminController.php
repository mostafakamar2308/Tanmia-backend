<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Traits\AdminsTrait;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AdminsTrait;

    public function index()
    {
        $admins = User::latest()->paginate(10);
        return view('dashboard.users.index',compact('admins'));
    }


    Public function store(AdminRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user= User::create($data);
        session()->flash('success', __('general.created_successfully'));

        return redirect()->back();

    }
    public function destroy($id){
        $admin = User::find($id);

        $admin->delete();
      session()->flash('success', __('general.deleted_successfully'));

        return redirect()->back();
    }
    public function update(AdminRequest $request,$id){

        $admin = User::find($id);



        $data = $request->validated();

        $admin->update($data);
        session()->flash('success', __('general.updated_successfully'));
        return redirect()->back();

    }

    public function status(){
        foreach (json_decode(request()->record_ids) as $recordId) {
            $admin = User::find($recordId);
            if ($admin->status === 'active'){
                $admin->status = 'inactive';
            }else{
                $admin->status = 'active';
            }
            $admin->save();
        }
       session()->flash('success', __('general.updated_successfully'));

        return redirect()->back();
    }
    public function bulk_delete(){
        foreach (json_decode(request()->record_ids) as $recordId) {
            $admin = User::find($recordId);
            $admin->delete();
        }
    session()->flash('success', __('general.deleted_successfully'));

        return redirect()->back();
    }


}

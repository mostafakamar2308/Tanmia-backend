<?php
namespace App\Traits;

use App\Models\Message;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

trait MessagesTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $messages = Message::latest()->get();


      return DataTables::of($messages)
          ->addColumn('record_select', 'dashboard.messages.data_table.record_select')
          ->editColumn('status', function (Message $message) {
              return view('dashboard.messages.data_table.status',compact('message'));

          })


          ->editColumn('created_at', function (Message $message) {
              return $message->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (Message $messages){
              return view('dashboard.messages.data_table.actions',compact('messages'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }






}

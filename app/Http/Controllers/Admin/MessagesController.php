<?php

namespace App\Http\Controllers\Admin;

use App\Events\LiRemove;
use App\Http\Controllers\Controller;
use App\Mail\TanmiaMail;
use App\Models\Message;
use App\Notifications\UserMail;
use App\Traits\MessagesTrait;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MessagesController extends Controller
{
    use MessagesTrait;

    public function index()
    {

        return view('dashboard.messages.index');
    }
    public function data(){
        return $this->DataAjax();
    }


    public function reply(Request $request){
        $data = $request->validate([
            'id' => 'required|exists:messages,id',
            'replay' => 'required|string',
            'name' => 'required|string',
        ]);

        $message = Message::findOrFail($data['id']);

        $message->update([
            'status' => 'replied'
        ]);

        Mail::to($message->email)->send(new TanmiaMail($data));
Notification::route('mail', $message->email)->notify(new UserMail($data));

        return response()->json([
            'status' => true,
            'message' => __('general.message_sent_successfully')
        ]);
    }
    public function show($id)
    {

        $message =  Message::findOrFail($id);

        //notification read
        auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        $count = auth()->user()->unreadNotifications->where('read_at',null)->count();
        event(new LiRemove($count));



        return view('dashboard.messages.show',compact('message','count'));
    }
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json([
            'status' => true,
            'message' => __('general.deleted_successfully')
        ]);
    }




}

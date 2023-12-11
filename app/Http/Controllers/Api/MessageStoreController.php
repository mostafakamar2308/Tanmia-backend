<?php

namespace App\Http\Controllers\Api;

use App\Events\sent_message;
use App\Events\UserMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MessagesRequest;
use App\Models\Message;
use App\Notifications\UserMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageStoreController extends Controller
{
    public function store(MessagesRequest $request){
        $lang = $request->header('lang');
        if ($lang){
            app()->setLocale($lang);
        }

           $data = $request->validated();
         $message = Message::create($data);
         $time = $message->created_at->diffForHumans();

         event(new sent_message($message->message, $message->name,$time, $message->id));
       User::find(1)->notify(new UserMessage($message->name, $message->message, $message->id));


                return response()->apiSuccess(__('general.message_sent_successfully'));
    }



}

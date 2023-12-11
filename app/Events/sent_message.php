<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class sent_message  implements ShouldBroadcast
{
    public $message;
    public $name;
    public $time;
    public $id;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($message,$name,$time,$id)
    {
        $this->message = $message;
        $this->name = $name;
        $this->time = $time;
        $this->id = $id;

    }
    //


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('massage-channel');
    }

    public function broadcastAs(): string
    {
        return 'sent-message-user';
    }
}

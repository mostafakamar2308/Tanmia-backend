<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LiRemove implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public int $count;
    /**
     * Create a new event instance.
     */
    public function __construct(int $count)
    {
        $this->count=$count;
    }

        //


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return  new Channel('remove_li');
    }

    public function broadcastAs(): string
    {
        return 'remove_li';
    }
}

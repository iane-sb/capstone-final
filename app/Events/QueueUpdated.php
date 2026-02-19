<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QueueUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $queueNumber;

    public function __construct($queueNumber)
    {
        $this->queueNumber = $queueNumber;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('queue-channel');
    }

    public function broadcastAs(): string
    {
        return 'queue.updated';
    }
}

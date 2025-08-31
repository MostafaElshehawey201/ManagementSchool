<?php

namespace App\Events;

use App\services\MailCreateNewStudent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventCreateNewStudent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $requestDataFactory;
    
    public function __construct($requestDataFactory)
    {
        $this->requestDataFactory = $requestDataFactory ;
    }
    

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

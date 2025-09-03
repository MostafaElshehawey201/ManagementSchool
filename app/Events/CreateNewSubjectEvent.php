<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateNewSubjectEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $CreateNewSubjectService;
    public $userData;
    public function __construct($CreateNewSubjectService , $userData)
    {
        $this->CreateNewSubjectService = $CreateNewSubjectService;
        $this->userData = $userData;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

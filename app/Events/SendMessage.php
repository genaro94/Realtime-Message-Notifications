<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Message;
use App\User;

class SendMessage implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $message;
    private $user;

    public function __construct(Message $message, User $user)
    {
        $this->message = $message;
        $this->user    = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    //para usuarios privado
    public function broadcastOn()
    {
        return new PrivateChannel('message.received.' . $this->user->id);
    }

    public function broadcastWith(){
        return $this->message->toArray();
    }
}

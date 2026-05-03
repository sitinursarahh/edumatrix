<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message->load('user');
    }

    public function broadcastOn()
    {
        return new Channel('class.' . $this->message->class_id);
    }

    public function broadcastWith()
{
    return [
        'id' => $this->message->id,
        'message' => $this->message->message,
        'user' => $this->message->user->name,
        'user_id' => $this->message->user_id,
        'photo' => $this->message->user->profile_photo_path,
        'time' => $this->message->created_at->format('H:i'),

        // 🔥 TAMBAHKAN INI
        'file_path' => $this->message->file_path,
        'file_name' => $this->message->file_name,
    ];
}
}

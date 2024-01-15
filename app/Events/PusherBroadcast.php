<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Notification;
use Carbon\Carbon;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $from_app;

    public $message;

    public $link;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $from_app, $message, $link)
    {
        $this->user = $user;
        $this->from_app = $from_app;
        $this->message  = $message;
        $this->link  = $link;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        Notification::create([
            'user' => $this->user,
            'from_app' => $this->from_app,
            'message' => $this->message,
            'link' => $this->link,
            'read' => false,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        return ['notification.' . $this->user];
    }

    public function broadcastAs(): string
    {
        return 'notification';
    }
}

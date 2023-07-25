<?php

namespace App\Events;

use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPost as NotificationsNewPost;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Notifications\NewPost;
use Illuminate\Notifications\Notifiable;

class PostAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels , Notifiable;

    /**
     * Create a new event instance.
     *
     * @return void
     */

     public $notf;

    public function __construct(NewPost $notf)
    {
       $this->notf = $notf->toArray();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notify');
    }


    public function broadcastAs(): string
{
    return 'post.added';
}

public function broadcastQueue(): string
{
    return 'database';
}


}

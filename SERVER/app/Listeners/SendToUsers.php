<?php

namespace App\Listeners;

use App\Events\PostAdded;
use App\Mail\NewPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendToUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostAdded  $event
     * @return void
     */
    public function handle(PostAdded $event)
    {

        $emails = User::select("email")->where('email','!=',$event->user->email)->get();
        foreach ($emails as $email) {
            Mail::to($email)->send(new NewPost($event->user,$event->post));

        }


    }


}

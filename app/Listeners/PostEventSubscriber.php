<?php

namespace App\Listeners;

use App\Notifications\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostEventSubscriber
{
    /**
     * Handle post creating events.
     *
     * @param $post
     */
    public function onCreated($post)
    {
        $post->notify(new PostCreated);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'eloquent.created: App\Post',
            'App\Listeners\PostEventSubscriber@onCreated'
        );
    }
}

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
     * Handle post creating events.
     *
     * @param $post
     */
    public function onUpdated($post)
    {
        //$post->notify(new PostUpdated);
    }

    /**
     * Handle post creating events.
     *
     * @param $post
     */
    public function onDeleted($post)
    {
        //$post->notify(new PostDeleted);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen('eloquent.created: App\Post', 'App\Listeners\PostEventSubscriber@onCreated');
        $events->listen('eloquent.updated: App\Post', 'App\Listeners\PostEventSubscriber@onUpdated');
        $events->listen('eloquent.deleted: App\Post', 'App\Listeners\PostEventSubscriber@onDeleted');
    }
}

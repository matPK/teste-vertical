<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\FacebookPoster\FacebookPosterPost;
use NotificationChannels\FacebookPoster\FacebookPosterChannel;

class PostCreated extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FacebookPosterChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $post
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toFacebookPoster($post)
    {
        return with(new FacebookPosterPost($post->content));
    }
}

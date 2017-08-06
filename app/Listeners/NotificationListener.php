<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use App\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationListener
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
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        $notification = new Notification;
        $notification->message = 'New solution for your question';
        $notification->is_view = false;
        $notification->user_id =$event->solution->user_id;
        $notification->save();
    }
}

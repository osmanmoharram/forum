<?php

namespace App\Listeners;

use App\Events\CreatedTopic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatedTopicListener
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
     * @param  \App\Events\CreatedTopic  $event
     * @return void
     */
    public function handle(CreatedTopic $event)
    {
        //
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCreated2
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        info('Hello User 2 '.date('h:i:s').' '.$event->user->id);
        sleep(5);
        info('GoodBye User 2 '.date('h:i:s').' '.$event->user->id);
    }
}

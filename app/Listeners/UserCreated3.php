<?php

namespace App\Listeners;

use App\Jobs\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCreated3
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
        info('Hello User 3 '.date('h:i:s').' '.$event->user->id);
        UserCreated::dispatch($event->user);
        info('GoodBye User 3 '.date('h:i:s').' '.$event->user->id);
    }
}

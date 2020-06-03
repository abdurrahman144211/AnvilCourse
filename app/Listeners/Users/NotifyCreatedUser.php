<?php

namespace App\Listeners\Users;

use App\Events\Users\UserWasCreated;
use App\Notifications\Users\YouWereCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyCreatedUser implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $event->user->notify(new YouWereCreated($event->user));
    }
}

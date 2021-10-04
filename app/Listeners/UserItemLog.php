<?php

namespace App\Listeners;

use App\Events\UserItemAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UserItemLog
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
    public function handle(UserItemAction $event)
    {
        DB::table('logs')->insert([
            'user_id' => auth()->user()->id,
            'log_entry' => $event->log
        ]);
    }
}

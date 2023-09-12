<?php

namespace App\Listeners;

use App\Events\WelcomeHos;
use App\Mail\ResponseMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendResponse
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
     * @param  \App\Events\WelcomeHos  $event
     * @return void
     */
    public function handle(WelcomeHos $event)
    {
        Mail::to($event->hosp->email)->send(new ResponseMail($event->hosp->email));
    }
}

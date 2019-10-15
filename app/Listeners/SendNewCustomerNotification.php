<?php

namespace App\Listeners;

use App\Events\NewCustomerAdded;
use App\Mail\NewCustomerAddedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewCustomerNotification
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
     * @param  NewCustomerAdded  $event
     * @return void
     */
    public function handle(NewCustomerAdded $event)
    {
        Mail::to('admin@coders-tape.test')->send(new NewCustomerAddedMail($event->customer));
    }
}

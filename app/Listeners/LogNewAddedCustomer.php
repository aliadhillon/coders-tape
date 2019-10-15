<?php

namespace App\Listeners;

use App\Events\NewCustomerAdded;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogNewAddedCustomer
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
        Log::info("New Customer Added:", ['name' => $event->customer->name, 'email' => $event->customer->email]);
    }
}

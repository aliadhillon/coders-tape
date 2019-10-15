<?php

namespace App\Listeners;

use App\Events\CustomerPermanentlyDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogPermanentlyDeletedCustomer
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
     * @param  CustomerPermanentlyDeleted  $event
     * @return void
     */
    public function handle(CustomerPermanentlyDeleted $event)
    {
        Log::info('Customer Pernamnently Deleted:', ['customer' => $event->customer]);
    }
}

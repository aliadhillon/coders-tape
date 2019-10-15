<?php

namespace App\Listeners;

use App\Events\CustomerPermanentlyDeleted;
use App\Events\NewCustomerAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CustomerEventLogger
{
    public function newCustomerAdded(NewCustomerAdded $event)
    {
        Log::info('New Customer Added', ['customer' => $event->customer]);
    }

    public function customerPermanentlyDeleted(CustomerPermanentlyDeleted $event)
    {
        Log::info('Customer Deleted Permanently', ['customer' => $event->customer]);
    }
    public function subscribe($events)
    {
        $events->listen(
            NewCustomerAdded::class,
            'App\Listeners\CustomerEventLogger@newCustomerAdded'
        );

        $events->listen(
            CustomerPermanentlyDeleted::class,
            'App\Listeners\CustomerEventLogger@customerPermanentlyDeleted'
        );
    }
}

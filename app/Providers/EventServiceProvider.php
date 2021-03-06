<?php

namespace App\Providers;

use App\Events\CustomerDeleted;
use App\Events\CustomerPermanentlyDeleted;
use App\Events\NewCustomerAdded;
use App\Listeners\CustomerEventLogger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use App\Listeners\LogNewAddedCustomer;
use App\Listeners\LogPermanentlyDeletedCustomer;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendNewCustomerNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewCustomerAdded::class => [
            // LogNewAddedCustomer::class,
            SendNewCustomerNotification::class
        ],
        // CustomerPermanentlyDeleted::class => [
        //     LogPermanentlyDeletedCustomer::class
        // ]
    ];

    protected $subscribe = [
        CustomerEventLogger::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(CustomerDeleted::class, function(CustomerDeleted $event){
            Log::info("Customer Deleted:", ['customer' => $event->customer]);
        });
    }
}

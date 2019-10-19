<?php

namespace App\Console\Commands;

use App\Customer;
use Illuminate\Console\Command;

class ClearCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Customer::truncate();
        $this->info('Customers table has been truncated.');
        $this->call('upload:clear');
    }
}

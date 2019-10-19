<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();

        Artisan::call('upload:clear');
        print Artisan::output();
        factory(Customer::class, 20)->create();
    }
}

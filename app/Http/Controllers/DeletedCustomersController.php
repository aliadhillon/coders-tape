<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\CustomerPermanentlyDeleted;
use Illuminate\Http\Request;

class DeletedCustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::onlyTrashed()->get();

        return view('deleted-customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        // dd($customer);
        return view('deleted-customer.show', compact('customer'));
    }

    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->route('deleted-customers.index')->with('msg', "Customer Restored: <strong>{$customer->name}</strong>");
    }

    public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);

        $customer->forceDelete();

        event(new CustomerPermanentlyDeleted($customer));

        return redirect()->route('deleted-customers.index')->with('msg', "Customer Deleted Permanently: <strong>{$customer->name}</strong>");
    }

}

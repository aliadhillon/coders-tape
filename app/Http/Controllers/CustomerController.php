<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Show all the Customers list
     *
     * @return View
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new Customer
     *
     * @return View
     */
    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));
    }

    /**
     * Store the New customer with the data coming from the request
     *
     * @param CustomerRequest $request
     * @return Redirect
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return redirect()->route('customers.show', compact('customer'));
    }

    /**
     * Show the Customer details
     *
     * @param Customer $customer
     * @return View
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show th edit page for Customer
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the Gien Customer with the given Request data
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return Redirect
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect()->route('customers.show', compact('customer'))->with('msg', "Customer Updated Successfully");
    }

    /**
     * Delte the given Customer
     *
     * @param Customer $customer
     * @return Redirect
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('msg', "Customer deleted: {$customer->name}");
    }
}

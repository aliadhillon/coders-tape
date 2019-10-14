<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:customers']
        ]);

        $customer = Customer::create($validated);

        return redirect()->route('customers.index')->with('msg', "New Customer Added: {$customer->name}");
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);
        $customer->update($validated);

        return redirect()->route('customers.show', compact('customer'))->with('msg', "Customer Updated Successfully");
    }
}
